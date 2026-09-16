<?php

namespace App\Services;

use Illuminate\Support\Facades\Http;
use RuntimeException;

class EncoreCssJsMirrorService extends EncoreMirrorService
{
    public function localizeHtml(string $html, string $pageUrl): string
    {
        $originHost = $this->normalizedHost((string) parse_url($this->origin(), PHP_URL_HOST));

        $html = preg_replace_callback('#<link\b[^>]*>#is', function (array $match) use ($pageUrl): string {
            $tag = $match[0];

            if ($this->linkLoadsCssOrJs($tag)) {
                $tag = preg_replace_callback('#\bhref=(["\'])(.*?)\1#is', function (array $attr) use ($pageUrl): string {
                    $remote = $this->absoluteUrl(html_entity_decode($attr[2], ENT_QUOTES), $pageUrl);
                    if ($remote === null || ! $this->isCssOrJs($remote)) {
                        return $attr[0];
                    }

                    return 'href=' . $attr[1] . $this->assetRoute($remote) . $attr[1];
                }, $tag, 1) ?? $tag;

                return preg_replace('#\s+integrity=(["\']).*?\1#is', '', $tag) ?? $tag;
            }

            return $this->absolutizeTag($tag, $pageUrl);
        }, $html) ?? $html;

        $html = preg_replace_callback('#<script\b[^>]*\bsrc=(["\'])(.*?)\1[^>]*>#is', function (array $match) use ($pageUrl): string {
            $tag = preg_replace_callback('#\bsrc=(["\'])(.*?)\1#is', function (array $attr) use ($pageUrl): string {
                $remote = $this->absoluteUrl(html_entity_decode($attr[2], ENT_QUOTES), $pageUrl);
                if ($remote === null || ! $this->isCssOrJs($remote)) {
                    return $attr[0];
                }

                return 'src=' . $attr[1] . $this->assetRoute($remote) . $attr[1];
            }, $match[0], 1) ?? $match[0];

            return preg_replace('#\s+integrity=(["\']).*?\1#is', '', $tag) ?? $tag;
        }, $html) ?? $html;

        $html = preg_replace_callback(
            '#<(img|source|video|audio|iframe)\b[^>]*>#is',
            fn (array $match) => $this->absolutizeTag($match[0], $pageUrl),
            $html
        ) ?? $html;

        $html = preg_replace_callback(
            '#url\(\s*(["\']?)(/(?!/)[^\)"\']+)\1\s*\)#i',
            fn (array $match) => 'url(' . $match[1] . $this->origin() . $match[2] . $match[1] . ')',
            $html
        ) ?? $html;

        $html = preg_replace_callback(
            '#(["\'])((?:https?:)?//[^"\']+\.(?:css|js|mjs)(?:\?[^"\']*)?|/(?:cdn|assets|wpm|shopifycloud|services)/[^"\']+\.(?:css|js|mjs)(?:\?[^"\']*)?)\1#i',
            function (array $match) use ($pageUrl): string {
                $remote = $this->absoluteUrl(html_entity_decode($match[2], ENT_QUOTES), $pageUrl);
                return $remote === null ? $match[0] : $match[1] . $this->assetRoute($remote) . $match[1];
            },
            $html
        ) ?? $html;

        $html = preg_replace_callback('#\b(href|action)=(["\'])(.*?)\2#is', function (array $match) use ($pageUrl, $originHost): string {
            $value = html_entity_decode($match[3], ENT_QUOTES);

            if ($value === '' || str_starts_with($value, self::BASE_MARKER) || preg_match('#^(?:#|mailto:|tel:|javascript:|data:|blob:)#i', $value) || $this->isCssOrJs($value)) {
                return $match[0];
            }

            $absolute = $this->absoluteUrl($value, $pageUrl);
            if ($absolute === null || $this->normalizedHost((string) parse_url($absolute, PHP_URL_HOST)) !== $originHost) {
                return $match[0];
            }

            $path = (string) (parse_url($absolute, PHP_URL_PATH) ?: '/');
            $query = parse_url($absolute, PHP_URL_QUERY);
            $fragment = parse_url($absolute, PHP_URL_FRAGMENT);
            $local = self::BASE_MARKER . $path;

            if (is_string($query) && $query !== '') {
                $local .= '?' . $query;
            }
            if (is_string($fragment) && $fragment !== '') {
                $local .= '#' . $fragment;
            }

            return $match[1] . '=' . $match[2] . $local . $match[2];
        }, $html) ?? $html;

        return preg_replace('/<head(\s[^>]*)?>/i', '$0' . $this->basePathShim(), $html, 1) ?? $html;
    }

    public function decodeSignedAsset(string $encoded, string $signature): ?string
    {
        $url = parent::decodeSignedAsset($encoded, $signature);
        return $url !== null && $this->isCssOrJs($url) ? $url : null;
    }

    public function cacheAsset(string $remoteUrl, bool $force = false, bool $recursive = false): array
    {
        $remoteUrl = preg_replace('/#.*$/', '', $remoteUrl) ?? $remoteUrl;
        if (! $this->isCssOrJs($remoteUrl)) {
            throw new RuntimeException('Only CSS and JavaScript files are mirrored locally.');
        }

        if (! $force && ($cached = parent::cachedAsset($remoteUrl)) !== null) {
            return $cached;
        }

        $hash = hash('sha256', $remoteUrl);
        $pathPart = (string) parse_url($remoteUrl, PHP_URL_PATH);
        $extension = strtolower((string) pathinfo($pathPart, PATHINFO_EXTENSION));
        $extension = in_array($extension, ['css', 'js', 'mjs'], true) ? $extension : 'js';
        $directory = $this->cacheRoot() . '/assets/' . substr($hash, 0, 2);
        $path = $directory . '/' . $hash . '.' . $extension;
        $metaPath = $directory . '/' . $hash . '.json';

        if (! is_dir($directory) && ! mkdir($directory, 0775, true) && ! is_dir($directory)) {
            throw new RuntimeException('Unable to create Encore CSS/JS cache directory.');
        }

        $response = Http::withHeaders([
            'User-Agent' => 'Mozilla/5.0 EncoreCssJsMirror/1.0',
            'Accept' => '*/*',
            'Referer' => $this->origin() . '/',
        ])->timeout((int) config('encore-mirror.asset_timeout', 120))
            ->withOptions([
                'verify' => (bool) config('encore-mirror.verify_ssl', true),
                'allow_redirects' => true,
            ])->get($remoteUrl);

        if (! $response->successful()) {
            throw new RuntimeException('Unable to download Encore CSS/JS: ' . $remoteUrl . ' (' . $response->status() . ')');
        }

        $contentType = (string) ($response->header('Content-Type') ?: ($extension === 'css' ? 'text/css; charset=UTF-8' : 'application/javascript; charset=UTF-8'));
        $content = $response->body();

        if ($extension === 'css' || str_contains(strtolower($contentType), 'text/css')) {
            $content = $this->rewriteCss($content, $remoteUrl);
        } else {
            $content = $this->rewriteJsImports($content, $remoteUrl);
        }

        file_put_contents($path, $content);
        file_put_contents($metaPath, json_encode([
            'remote_url' => $remoteUrl,
            'content_type' => $contentType,
            'cached_at' => now()->toIso8601String(),
        ], JSON_PRETTY_PRINT | JSON_UNESCAPED_SLASHES));

        if ($recursive) {
            foreach ($this->extractAssetUrls($content) as $nestedUrl) {
                try {
                    $this->cacheAsset($nestedUrl, $force, true);
                } catch (\Throwable) {
                    // Optional theme chunks must not abort the whole sync.
                }
            }
        }

        return ['path' => $path, 'content_type' => $contentType, 'remote_url' => $remoteUrl];
    }

    private function rewriteCss(string $css, string $baseUrl): string
    {
        $css = preg_replace_callback('#@import\s+(?:url\(\s*)?(["\']?)(.*?)\1\s*\)?#is', function (array $match) use ($baseUrl): string {
            $remote = $this->absoluteUrl(trim($match[2]), $baseUrl);
            return $remote !== null && $this->isCssOrJs($remote)
                ? '@import url("' . $this->assetRoute($remote) . '")'
                : $match[0];
        }, $css) ?? $css;

        return preg_replace_callback('#url\(\s*(["\']?)(.*?)\1\s*\)#is', function (array $match) use ($baseUrl): string {
            $value = trim(html_entity_decode($match[2], ENT_QUOTES));
            if ($value === '' || str_starts_with($value, self::BASE_MARKER) || preg_match('#^(?:data:|blob:|#)#i', $value)) {
                return $match[0];
            }

            $remote = $this->absoluteUrl($value, $baseUrl);
            if ($remote === null) {
                return $match[0];
            }

            return $this->isCssOrJs($remote)
                ? 'url("' . $this->assetRoute($remote) . '")'
                : 'url("' . $remote . '")';
        }, $css) ?? $css;
    }

    private function rewriteJsImports(string $js, string $baseUrl): string
    {
        return preg_replace_callback(
            '#\b(from\s+|import\s*\(\s*|import\s+)(["\'])(\.?\.?/[^"\']+|/[^"\']+|https?://[^"\']+|//[^"\']+)\2#i',
            function (array $match) use ($baseUrl): string {
                $remote = $this->absoluteUrl($match[3], $baseUrl);
                return $remote !== null && $this->isCssOrJs($remote)
                    ? $match[1] . $match[2] . $this->assetRoute($remote) . $match[2]
                    : $match[0];
            },
            $js
        ) ?? $js;
    }

    private function linkLoadsCssOrJs(string $tag): bool
    {
        if (! preg_match('#\brel=(["\'])(.*?)\1#is', $tag, $relMatch)) {
            return false;
        }

        $rel = strtolower($relMatch[2]);
        if (str_contains($rel, 'stylesheet') || str_contains($rel, 'modulepreload')) {
            return true;
        }

        return (str_contains($rel, 'preload') || str_contains($rel, 'prefetch'))
            && preg_match('#\bas=(["\'])(?:style|script)\1#i', $tag) === 1;
    }

    private function absolutizeTag(string $tag, string $pageUrl): string
    {
        $tag = preg_replace_callback('#\b(src|poster|href)=(["\'])(.*?)\2#is', function (array $match) use ($pageUrl): string {
            $value = html_entity_decode($match[3], ENT_QUOTES);
            if ($value === '' || str_starts_with($value, self::BASE_MARKER) || preg_match('#^(?:data:|blob:|#)#i', $value)) {
                return $match[0];
            }

            $remote = $this->absoluteUrl($value, $pageUrl);
            return $remote === null ? $match[0] : $match[1] . '=' . $match[2] . $remote . $match[2];
        }, $tag) ?? $tag;

        return preg_replace_callback('#\b(srcset|data-srcset)=(["\'])(.*?)\1#is', function (array $match) use ($pageUrl): string {
            $items = preg_split('/\s*,\s*/', html_entity_decode($match[2], ENT_QUOTES)) ?: [];
            foreach ($items as &$item) {
                if (preg_match('/^(\S+)(.*)$/s', trim($item), $piece)) {
                    $remote = $this->absoluteUrl($piece[1], $pageUrl);
                    if ($remote !== null) {
                        $item = $remote . $piece[2];
                    }
                }
            }
            unset($item);

            return $match[1] . '="' . implode(', ', $items) . '"';
        }, $tag) ?? $tag;
    }

    private function isCssOrJs(string $url): bool
    {
        $value = str_starts_with($url, '//') ? 'https:' . $url : $url;
        $path = (string) parse_url($value, PHP_URL_PATH);
        return preg_match('/\.(?:css|js|mjs)$/i', $path) === 1;
    }

    private function absoluteUrl(string $value, string $baseUrl): ?string
    {
        $value = trim($value);
        if ($value === '' || str_starts_with($value, self::BASE_MARKER) || preg_match('#^(?:data:|blob:|javascript:|mailto:|tel:|#)#i', $value)) {
            return null;
        }

        if (preg_match('#^https?://#i', $value)) {
            return preg_replace('/#.*$/', '', $value) ?? $value;
        }

        $base = parse_url($baseUrl);
        if (! is_array($base) || empty($base['host'])) {
            return null;
        }

        $scheme = $base['scheme'] ?? 'https';
        $authority = $scheme . '://' . $base['host'] . (isset($base['port']) ? ':' . $base['port'] : '');

        if (str_starts_with($value, '//')) {
            return $scheme . ':' . $value;
        }
        if (str_starts_with($value, '/')) {
            return $authority . $value;
        }

        $directory = str_ends_with($base['path'] ?? '/', '/') ? ($base['path'] ?? '/') : dirname($base['path'] ?? '/') . '/';
        $segments = [];
        foreach (explode('/', $directory . $value) as $segment) {
            if ($segment === '' || $segment === '.') {
                continue;
            }
            if ($segment === '..') {
                array_pop($segments);
                continue;
            }
            $segments[] = $segment;
        }

        return $authority . '/' . implode('/', $segments);
    }

    private function normalizedHost(string $host): string
    {
        return strtolower((string) preg_replace('/^www\./i', '', $host));
    }

    private function basePathShim(): string
    {
        return <<<'HTML'
<script id="encore-local-basepath">
(function(){
  var marker='__ENCORE_BASE__';
  var path=window.location.pathname||'/';
  var i=path.indexOf('/public/');
  var base=i>=0?path.substring(0,i+7):'';
  function local(url){
    if(typeof url!=='string') return url;
    if(url.indexOf(marker)===0) return base+url.substring(marker.length);
    if(url.charAt(0)==='/'&&base&&url.indexOf(base+'/')!==0) return base+url;
    return url;
  }
  if(window.fetch){var f=window.fetch.bind(window);window.fetch=function(input,init){if(typeof input==='string')input=local(input);return f(input,init);};}
  var o=XMLHttpRequest.prototype.open;XMLHttpRequest.prototype.open=function(method,url){arguments[1]=local(url);return o.apply(this,arguments);};
})();
</script>
HTML;
    }
}
