<?php

namespace App\Services;

use Illuminate\Support\Facades\Http;
use RuntimeException;

class EncoreCssJsMirrorService extends EncoreMirrorService
{
    public function localizeHtml(string $html, string $pageUrl): string
    {
        $originHost = $this->normalizedHost((string) parse_url($this->origin(), PHP_URL_HOST));

        // Keep the source storefront typography exactly: Open Sans for body copy
        // and Oswald for headings/navigation. The original page source loads
        // Open Sans 400/700 and Oswald 400, while GemPages also requests the
        // extended Oswald weight range. Those stylesheets and their font files
        // are mirrored locally through /__encore/asset.
        $html = preg_replace_callback('#<link\b[^>]*>#is', function (array $match) use ($pageUrl): string {
            $tag = $match[0];

            if ($this->linkLoadsMirrorAsset($tag)) {
                $tag = preg_replace_callback('#\bhref=(["\'])(.*?)\1#is', function (array $attr) use ($pageUrl, $tag): string {
                    $remote = $this->absoluteUrl(html_entity_decode($attr[2], ENT_QUOTES), $pageUrl);
                    if ($remote === null || ! $this->isMirrorAsset($remote, $tag)) {
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
                if ($remote === null || ! $this->isScriptUrl($remote)) {
                    return $attr[0];
                }

                return 'src=' . $attr[1] . $this->assetRoute($remote) . $attr[1];
            }, $match[0], 1) ?? $match[0];

            return preg_replace('#\s+integrity=(["\']).*?\1#is', '', $tag) ?? $tag;
        }, $html) ?? $html;

        // Images and video intentionally stay on their source URLs. This removes
        // the old duplicate local media library while preserving the live visuals.
        $html = preg_replace_callback(
            '#<(img|source|video|audio|iframe)\b[^>]*>#is',
            fn (array $match) => $this->absolutizeTag($match[0], $pageUrl),
            $html
        ) ?? $html;

        // Inline background URLs from the Shopify HTML should still resolve to
        // the source storefront rather than the local Laravel root.
        $html = preg_replace_callback(
            '#url\(\s*(["\']?)(/(?!/)[^\)"\']+)\1\s*\)#i',
            fn (array $match) => 'url(' . $match[1] . $this->origin() . $match[2] . $match[1] . ')',
            $html
        ) ?? $html;

        // CSS/JS URLs embedded in inline JSON/JavaScript are localized too.
        $html = preg_replace_callback(
            '#(["\'])((?:https?:)?//[^"\']+|/(?:cdn|assets|wpm|shopifycloud|services)/[^"\']+)\1#i',
            function (array $match) use ($pageUrl): string {
                $remote = $this->absoluteUrl(html_entity_decode($match[2], ENT_QUOTES), $pageUrl);
                if ($remote === null || ! $this->isMirrorAsset($remote)) {
                    return $match[0];
                }

                return $match[1] . $this->assetRoute($remote) . $match[1];
            },
            $html
        ) ?? $html;

        // Keep navigation and forms inside this Laravel copy.
        $html = preg_replace_callback('#\b(href|action)=(["\'])(.*?)\2#is', function (array $match) use ($pageUrl, $originHost): string {
            $value = html_entity_decode($match[3], ENT_QUOTES);

            if (
                $value === ''
                || str_starts_with($value, self::BASE_MARKER)
                || preg_match('#^(?:#|mailto:|tel:|javascript:|data:|blob:)#i', $value)
                || $this->isMirrorAsset($value)
            ) {
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

        $headAdditions = $this->fontMatchStyle() . $this->basePathShim();

        return preg_replace('/<head(\s[^>]*)?>/i', '$0' . $headAdditions, $html, 1) ?? $html;
    }

    public function decodeSignedAsset(string $encoded, string $signature): ?string
    {
        $url = parent::decodeSignedAsset($encoded, $signature);

        return $url !== null && $this->isMirrorAsset($url) ? $url : null;
    }

    public function cachedAsset(string $remoteUrl): ?array
    {
        [$path, $metaPath] = $this->assetPaths($remoteUrl);

        if (! is_file($path) || ! is_file($metaPath)) {
            return null;
        }

        $meta = json_decode((string) file_get_contents($metaPath), true) ?: [];

        return [
            'path' => $path,
            'content_type' => (string) ($meta['content_type'] ?? $this->guessContentType($remoteUrl)),
            'remote_url' => $remoteUrl,
        ];
    }

    public function cacheAsset(string $remoteUrl, bool $force = false, bool $recursive = false): array
    {
        $remoteUrl = preg_replace('/#.*$/', '', $remoteUrl) ?? $remoteUrl;

        if (! $this->isMirrorAsset($remoteUrl)) {
            throw new RuntimeException('Only Encore CSS, JavaScript and web-font files are mirrored locally.');
        }

        if (! $force && ($cached = $this->cachedAsset($remoteUrl)) !== null) {
            return $cached;
        }

        [$path, $metaPath] = $this->assetPaths($remoteUrl);
        $directory = dirname($path);

        if (! is_dir($directory) && ! mkdir($directory, 0775, true) && ! is_dir($directory)) {
            throw new RuntimeException('Unable to create Encore CSS/JS/font cache directory.');
        }

        $response = Http::withHeaders([
            'User-Agent' => 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 Chrome/152.0 Safari/537.36',
            'Accept' => '*/*',
            'Referer' => $this->origin() . '/',
        ])->timeout((int) config('encore-mirror.asset_timeout', 120))
            ->withOptions([
                'verify' => (bool) config('encore-mirror.verify_ssl', true),
                'allow_redirects' => true,
            ])->get($remoteUrl);

        if (! $response->successful()) {
            throw new RuntimeException('Unable to download Encore asset: ' . $remoteUrl . ' (' . $response->status() . ')');
        }

        $contentType = (string) ($response->header('Content-Type') ?: $this->guessContentType($remoteUrl));
        $content = $response->body();
        $lowerType = strtolower($contentType);

        if ($this->isStylesheetUrl($remoteUrl) || str_contains($lowerType, 'text/css')) {
            $content = $this->rewriteCss($content, $remoteUrl);
            file_put_contents($path, $content);
        } elseif ($this->isScriptUrl($remoteUrl) || str_contains($lowerType, 'javascript')) {
            $content = $this->rewriteJsImports($content, $remoteUrl);
            file_put_contents($path, $content);
        } else {
            file_put_contents($path, $content);
        }

        file_put_contents($metaPath, json_encode([
            'remote_url' => $remoteUrl,
            'content_type' => $contentType,
            'cached_at' => now()->toIso8601String(),
        ], JSON_PRETTY_PRINT | JSON_UNESCAPED_SLASHES));

        if ($recursive && ($this->isStylesheetUrl($remoteUrl) || $this->isScriptUrl($remoteUrl))) {
            foreach ($this->extractAssetUrls($content) as $nestedUrl) {
                try {
                    $this->cacheAsset($nestedUrl, $force, true);
                } catch (\Throwable) {
                    // An optional theme/font chunk must not abort the whole sync.
                }
            }
        }

        return [
            'path' => $path,
            'content_type' => $contentType,
            'remote_url' => $remoteUrl,
        ];
    }

    private function rewriteCss(string $css, string $baseUrl): string
    {
        $css = preg_replace_callback(
            '#@import\s+(?:url\(\s*)?(["\']?)(.*?)\1\s*\)?#is',
            function (array $match) use ($baseUrl): string {
                $remote = $this->absoluteUrl(trim($match[2]), $baseUrl);

                return $remote !== null && $this->isMirrorAsset($remote)
                    ? '@import url("' . $this->assetRoute($remote) . '")'
                    : $match[0];
            },
            $css
        ) ?? $css;

        return preg_replace_callback(
            '#url\(\s*(["\']?)(.*?)\1\s*\)#is',
            function (array $match) use ($baseUrl): string {
                $value = trim(html_entity_decode($match[2], ENT_QUOTES));

                if (
                    $value === ''
                    || str_starts_with($value, self::BASE_MARKER)
                    || preg_match('#^(?:data:|blob:|#)#i', $value)
                ) {
                    return $match[0];
                }

                $remote = $this->absoluteUrl($value, $baseUrl);
                if ($remote === null) {
                    return $match[0];
                }

                // Font files are localized so Oswald/Open Sans always render even
                // when Google/Shopify font hosts are blocked. Images remain remote.
                return $this->isMirrorAsset($remote)
                    ? 'url("' . $this->assetRoute($remote) . '")'
                    : 'url("' . $remote . '")';
            },
            $css
        ) ?? $css;
    }

    private function rewriteJsImports(string $js, string $baseUrl): string
    {
        return preg_replace_callback(
            '#\b(from\s+|import\s*\(\s*|import\s+)(["\'])(\.?\.?/[^"\']+|/[^"\']+|https?://[^"\']+|//[^"\']+)\2#i',
            function (array $match) use ($baseUrl): string {
                $remote = $this->absoluteUrl($match[3], $baseUrl);

                return $remote !== null && ($this->isScriptUrl($remote) || $this->isStylesheetUrl($remote))
                    ? $match[1] . $match[2] . $this->assetRoute($remote) . $match[2]
                    : $match[0];
            },
            $js
        ) ?? $js;
    }

    private function linkLoadsMirrorAsset(string $tag): bool
    {
        if (! preg_match('#\brel=(["\'])(.*?)\1#is', $tag, $relMatch)) {
            return false;
        }

        $rel = strtolower($relMatch[2]);

        if (str_contains($rel, 'stylesheet') || str_contains($rel, 'modulepreload')) {
            return true;
        }

        if (! str_contains($rel, 'preload') && ! str_contains($rel, 'prefetch')) {
            return false;
        }

        return preg_match('#\bas=(["\'])(?:style|script|font)\1#i', $tag) === 1;
    }

    private function absolutizeTag(string $tag, string $pageUrl): string
    {
        $tag = preg_replace_callback('#\b(src|poster|href)=(["\'])(.*?)\2#is', function (array $match) use ($pageUrl): string {
            $value = html_entity_decode($match[3], ENT_QUOTES);

            if (
                $value === ''
                || str_starts_with($value, self::BASE_MARKER)
                || preg_match('#^(?:data:|blob:|#)#i', $value)
            ) {
                return $match[0];
            }

            $remote = $this->absoluteUrl($value, $pageUrl);

            return $remote === null
                ? $match[0]
                : $match[1] . '=' . $match[2] . $remote . $match[2];
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

    private function isMirrorAsset(string $url, ?string $tag = null): bool
    {
        return $this->isStylesheetUrl($url, $tag)
            || $this->isScriptUrl($url)
            || $this->isFontUrl($url);
    }

    private function isStylesheetUrl(string $url, ?string $tag = null): bool
    {
        $value = str_starts_with($url, '//') ? 'https:' . $url : $url;
        $host = strtolower((string) parse_url($value, PHP_URL_HOST));
        $path = strtolower((string) parse_url($value, PHP_URL_PATH));

        if (preg_match('/\.css$/i', $path)) {
            return true;
        }

        if ($host === 'fonts.googleapis.com' && preg_match('#^/css2?$#', $path)) {
            return true;
        }

        return $tag !== null && preg_match('#\brel=(["\'])stylesheet\1#i', $tag) === 1;
    }

    private function isScriptUrl(string $url): bool
    {
        $value = str_starts_with($url, '//') ? 'https:' . $url : $url;
        $path = (string) parse_url($value, PHP_URL_PATH);

        return preg_match('/\.(?:js|mjs)$/i', $path) === 1;
    }

    private function isFontUrl(string $url): bool
    {
        $value = str_starts_with($url, '//') ? 'https:' . $url : $url;
        $path = (string) parse_url($value, PHP_URL_PATH);
        $host = strtolower((string) parse_url($value, PHP_URL_HOST));

        if (preg_match('/\.(?:woff2?|ttf|otf|eot)$/i', $path)) {
            return true;
        }

        return in_array($host, ['fonts.gstatic.com', 'fonts.shopifycdn.com'], true);
    }

    private function assetPaths(string $remoteUrl): array
    {
        $hash = hash('sha256', $remoteUrl);
        $extension = $this->assetExtension($remoteUrl);
        $directory = $this->cacheRoot() . '/assets/' . substr($hash, 0, 2);

        return [
            $directory . '/' . $hash . '.' . $extension,
            $directory . '/' . $hash . '.json',
        ];
    }

    private function assetExtension(string $url): string
    {
        $path = (string) parse_url($url, PHP_URL_PATH);
        $extension = strtolower((string) pathinfo($path, PATHINFO_EXTENSION));

        if (in_array($extension, ['css', 'js', 'mjs', 'woff', 'woff2', 'ttf', 'otf', 'eot'], true)) {
            return $extension;
        }

        if ($this->isStylesheetUrl($url)) {
            return 'css';
        }

        return $this->isScriptUrl($url) ? 'js' : 'bin';
    }

    private function guessContentType(string $url): string
    {
        return match ($this->assetExtension($url)) {
            'css' => 'text/css; charset=UTF-8',
            'js', 'mjs' => 'application/javascript; charset=UTF-8',
            'woff' => 'font/woff',
            'woff2' => 'font/woff2',
            'ttf' => 'font/ttf',
            'otf' => 'font/otf',
            'eot' => 'application/vnd.ms-fontobject',
            default => 'application/octet-stream',
        };
    }

    private function absoluteUrl(string $value, string $baseUrl): ?string
    {
        $value = trim($value);

        if (
            $value === ''
            || str_starts_with($value, self::BASE_MARKER)
            || preg_match('#^(?:data:|blob:|javascript:|mailto:|tel:|#)#i', $value)
        ) {
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

        $basePath = $base['path'] ?? '/';
        $directory = str_ends_with($basePath, '/') ? $basePath : dirname($basePath) . '/';
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

    private function fontMatchStyle(): string
    {
        return <<<'HTML'
<style id="encore-font-match">
html,
body,
input,
textarea,
select,
button {
  font-family: "Open Sans", Arial, sans-serif;
}

h1,
h2,
h3,
h4,
h5,
h6,
.h1,
.h2,
.h3,
.h4,
.h5,
.h6,
.site-nav__link,
.mobile-nav__link,
.site-footer__linklist-item,
.gf_gs-text-heading-1,
.gf_gs-text-heading-2,
.gf_gs-text-heading-3,
.gf_gs-text-heading-4 {
  font-family: "Oswald", Arial, sans-serif;
  font-weight: 400;
}

.site-nav__link--main,
#SiteNav > li > a,
#SiteNav .site-nav__link--main {
  font-family: "Oswald", Arial, sans-serif !important;
  font-weight: 400 !important;
}
</style>
HTML;
    }

    private function basePathShim(): string
    {
        return <<<'HTML'
<script id="encore-local-basepath">
(function () {
  var marker = '__ENCORE_BASE__';
  var path = window.location.pathname || '/';
  var publicIndex = path.indexOf('/public/');
  var base = publicIndex >= 0 ? path.substring(0, publicIndex + 7) : '';

  function local(url) {
    if (typeof url !== 'string') return url;
    if (url.indexOf(marker) === 0) {
      var suffix = url.substring(marker.length);
      if (base && suffix.charAt(0) === '/') return base + suffix;
      return base + suffix;
    }
    if (url.charAt(0) === '/' && base && url.indexOf(base + '/') !== 0) {
      return base + url;
    }
    return url;
  }

  if (window.fetch) {
    var originalFetch = window.fetch.bind(window);
    window.fetch = function (input, init) {
      if (typeof input === 'string') input = local(input);
      return originalFetch(input, init);
    };
  }

  var originalOpen = XMLHttpRequest.prototype.open;
  XMLHttpRequest.prototype.open = function (method, url) {
    arguments[1] = local(url);
    return originalOpen.apply(this, arguments);
  };
})();
</script>
HTML;
    }
}
