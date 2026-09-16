<?php

namespace App\Services;

use Illuminate\Support\Facades\Http;
use RuntimeException;

class EncoreMirrorService
{
    public const BASE_MARKER = '__ENCORE_BASE__';

    private array $warmingAssets = [];

    public function origin(): string
    {
        return rtrim((string) config('encore-mirror.origin', 'https://encorelacrosse.com'), '/');
    }

    public function cacheRoot(): string
    {
        return storage_path('app/private/encore-mirror');
    }

    public function pageCachePath(string $url): string
    {
        return $this->cacheRoot() . '/pages/' . hash('sha256', $url) . '.html';
    }

    public function pageMetaPath(string $url): string
    {
        return $this->cacheRoot() . '/pages/' . hash('sha256', $url) . '.json';
    }

    public function cachedPage(string $url): ?array
    {
        $path = $this->pageCachePath($url);
        $metaPath = $this->pageMetaPath($url);

        if (! is_file($path)) {
            return null;
        }

        $meta = is_file($metaPath)
            ? (json_decode((string) file_get_contents($metaPath), true) ?: [])
            : [];

        return [
            'body' => (string) file_get_contents($path),
            'status' => (int) ($meta['status'] ?? 200),
            'content_type' => (string) ($meta['content_type'] ?? 'text/html; charset=UTF-8'),
        ];
    }

    public function storePage(string $url, string $body, int $status, string $contentType): void
    {
        $this->ensureDirectory(dirname($this->pageCachePath($url)));
        file_put_contents($this->pageCachePath($url), $body);
        file_put_contents($this->pageMetaPath($url), json_encode([
            'url' => $url,
            'status' => $status,
            'content_type' => $contentType,
            'cached_at' => now()->toIso8601String(),
        ], JSON_PRETTY_PRINT | JSON_UNESCAPED_SLASHES));
    }

    public function applyBasePath(string $content, string $basePath): string
    {
        $basePath = rtrim($basePath, '/');

        return str_replace(self::BASE_MARKER, $basePath, $content);
    }

    public function localizeHtml(string $html, string $pageUrl): string
    {
        $originHost = $this->normalizedHost((string) parse_url($this->origin(), PHP_URL_HOST));

        // The copied storefront does not need DNS/CDN warm-up hints because all
        // visual assets are served through this Laravel application.
        $html = preg_replace(
            '#<link\b(?=[^>]*\brel=(["\'])(?:preconnect|dns-prefetch)\1)[^>]*>#i',
            '',
            $html
        ) ?? $html;

        // Localize every asset-bearing tag. This includes the original theme CSS,
        // JavaScript, images, video, icons and preload/font resources.
        $html = preg_replace_callback(
            '#<(link|script|img|source|video|audio|iframe)\b[^>]*>#is',
            function (array $match) use ($pageUrl): string {
                $tagName = strtolower($match[1]);
                $tag = $match[0];

                $tag = preg_replace_callback(
                    '#\b(src|poster|data-src|data-lazy-src|data-video-src)=(["\'])(.*?)\2#is',
                    function (array $attribute) use ($pageUrl): string {
                        $remote = $this->absoluteUrl(html_entity_decode($attribute[3], ENT_QUOTES), $pageUrl);

                        if ($remote === null) {
                            return $attribute[0];
                        }

                        return $attribute[1] . '=' . $attribute[2] . $this->assetRoute($remote) . $attribute[2];
                    },
                    $tag
                ) ?? $tag;

                $tag = preg_replace_callback(
                    '#\b(srcset|data-srcset)=(["\'])(.*?)\2#is',
                    function (array $attribute) use ($pageUrl): string {
                        $parts = preg_split('/\s*,\s*/', html_entity_decode($attribute[3], ENT_QUOTES)) ?: [];
                        $localized = [];

                        foreach ($parts as $part) {
                            if (! preg_match('/^(\S+)(.*)$/s', trim($part), $piece)) {
                                $localized[] = $part;
                                continue;
                            }

                            $remote = $this->absoluteUrl($piece[1], $pageUrl);
                            $localized[] = $remote === null
                                ? $part
                                : $this->assetRoute($remote) . $piece[2];
                        }

                        return $attribute[1] . '=' . $attribute[2] . implode(', ', $localized) . $attribute[2];
                    },
                    $tag
                ) ?? $tag;

                if ($tagName === 'link' && $this->linkTagLoadsAsset($tag)) {
                    $tag = preg_replace_callback(
                        '#\bhref=(["\'])(.*?)\1#is',
                        function (array $attribute) use ($pageUrl): string {
                            $remote = $this->absoluteUrl(html_entity_decode($attribute[2], ENT_QUOTES), $pageUrl);

                            if ($remote === null) {
                                return $attribute[0];
                            }

                            return 'href=' . $attribute[1] . $this->assetRoute($remote) . $attribute[1];
                        },
                        $tag,
                        1
                    ) ?? $tag;
                }

                // SRI hashes no longer match after CSS imports/URLs are localized.
                $tag = preg_replace('#\s+integrity=(["\']).*?\1#is', '', $tag) ?? $tag;

                return $tag;
            },
            $html
        ) ?? $html;

        // Inline CSS can contain background images and web-font URLs.
        $html = $this->rewriteCssReferences($html, $pageUrl);

        // Shopify embeds many image/font/video URLs inside JSON and inline JS.
        $html = preg_replace_callback(
            '#(["\'])((?:https?:)?//[^"\']+|/(?:cdn|assets|fonts|files|wpm|shopifycloud|services)/[^"\']+)\1#i',
            function (array $match) use ($pageUrl): string {
                $candidate = html_entity_decode($match[2], ENT_QUOTES);

                if (! $this->isStaticAssetCandidate($candidate)) {
                    return $match[0];
                }

                $remote = $this->absoluteUrl($candidate, $pageUrl);

                return $remote === null
                    ? $match[0]
                    : $match[1] . $this->assetRoute($remote) . $match[1];
            },
            $html
        ) ?? $html;

        // Keep all navigation and form submissions inside the Laravel copy.
        $html = preg_replace_callback(
            '#\b(href|action)=(["\'])(.*?)\2#is',
            function (array $match) use ($pageUrl, $originHost): string {
                $value = html_entity_decode($match[3], ENT_QUOTES);

                if ($value === '' || str_starts_with($value, self::BASE_MARKER) || preg_match('#^(?:#|mailto:|tel:|javascript:|data:|blob:)#i', $value)) {
                    return $match[0];
                }

                $absolute = $this->absoluteUrl($value, $pageUrl);
                if ($absolute === null) {
                    return $match[0];
                }

                $host = $this->normalizedHost((string) parse_url($absolute, PHP_URL_HOST));
                if ($host !== $originHost || $this->isStaticAssetCandidate($absolute)) {
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
            },
            $html
        ) ?? $html;

        $shim = $this->basePathShim();
        $html = preg_replace('/<head(\s[^>]*)?>/i', '$0' . $shim, $html, 1) ?? $html;

        return $html;
    }

    public function assetRoute(string $remoteUrl): string
    {
        $encoded = rtrim(strtr(base64_encode($remoteUrl), '+/', '-_'), '=');
        $signature = hash_hmac('sha256', $encoded, $this->signatureSecret());

        return self::BASE_MARKER . '/__encore/asset/' . $encoded . '/' . $signature;
    }

    public function decodeSignedAsset(string $encoded, string $signature): ?string
    {
        $expected = hash_hmac('sha256', $encoded, $this->signatureSecret());
        if (! hash_equals($expected, $signature)) {
            return null;
        }

        $padding = strlen($encoded) % 4;
        if ($padding !== 0) {
            $encoded .= str_repeat('=', 4 - $padding);
        }

        $decoded = base64_decode(strtr($encoded, '-_', '+/'), true);
        if (! is_string($decoded) || ! preg_match('#^https?://#i', $decoded)) {
            return null;
        }

        return $decoded;
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
            'content_type' => (string) ($meta['content_type'] ?? 'application/octet-stream'),
            'remote_url' => $remoteUrl,
        ];
    }

    public function cacheAsset(string $remoteUrl, bool $force = false, bool $recursive = false): array
    {
        $remoteUrl = $this->stripFragment($remoteUrl);
        $cached = $this->cachedAsset($remoteUrl);

        if ($cached !== null && ! $force) {
            return $cached;
        }

        if (isset($this->warmingAssets[$remoteUrl])) {
            if ($cached !== null) {
                return $cached;
            }

            throw new RuntimeException('Circular Encore asset dependency: ' . $remoteUrl);
        }

        $this->warmingAssets[$remoteUrl] = true;
        [$path, $metaPath] = $this->assetPaths($remoteUrl);
        $this->ensureDirectory(dirname($path));
        $temp = $this->cacheRoot() . '/tmp-' . bin2hex(random_bytes(8));

        try {
            $response = Http::withHeaders([
                'User-Agent' => 'Mozilla/5.0 EncoreLocalMirror/1.0',
                'Accept' => '*/*',
                'Referer' => $this->origin() . '/',
            ])->timeout((int) config('encore-mirror.asset_timeout', 120))
                ->withOptions([
                    'verify' => (bool) config('encore-mirror.verify_ssl', true),
                    'allow_redirects' => true,
                    'sink' => $temp,
                ])->get($remoteUrl);

            if (! $response->successful() || ! is_file($temp)) {
                @unlink($temp);
                throw new RuntimeException('Unable to download Encore asset: ' . $remoteUrl . ' (' . $response->status() . ')');
            }

            $contentType = (string) ($response->header('Content-Type') ?: $this->guessContentType($remoteUrl));
            $lowerType = strtolower($contentType);

            if (str_contains($lowerType, 'text/css') || preg_match('/\.css(?:$|\?)/i', $remoteUrl)) {
                $css = (string) file_get_contents($temp);
                $css = $this->rewriteCssReferences($css, $remoteUrl);
                file_put_contents($path, $css);
                @unlink($temp);
            } elseif (str_contains($lowerType, 'javascript') || preg_match('/\.(?:js|mjs)(?:$|\?)/i', $remoteUrl)) {
                $js = (string) file_get_contents($temp);
                $js = $this->rewriteJavaScriptImports($js, $remoteUrl);
                file_put_contents($path, $js);
                @unlink($temp);
            } else {
                if (! @rename($temp, $path)) {
                    copy($temp, $path);
                    @unlink($temp);
                }
            }

            file_put_contents($metaPath, json_encode([
                'remote_url' => $remoteUrl,
                'content_type' => $contentType,
                'cached_at' => now()->toIso8601String(),
            ], JSON_PRETTY_PRINT | JSON_UNESCAPED_SLASHES));

            $result = [
                'path' => $path,
                'content_type' => $contentType,
                'remote_url' => $remoteUrl,
            ];

            if ($recursive && (str_contains($lowerType, 'text/css') || str_contains($lowerType, 'javascript'))) {
                $text = (string) file_get_contents($path);
                foreach ($this->extractAssetUrls($text) as $nestedUrl) {
                    try {
                        $this->cacheAsset($nestedUrl, $force, true);
                    } catch (\Throwable) {
                        // One optional third-party file must not abort the whole sync.
                    }
                }
            }

            return $result;
        } finally {
            unset($this->warmingAssets[$remoteUrl]);
            @unlink($temp);
        }
    }

    public function fetchAndCachePage(string $url, bool $force = false): array
    {
        if (! $force && ($cached = $this->cachedPage($url)) !== null) {
            return $cached;
        }

        $response = Http::withHeaders([
            'User-Agent' => 'Mozilla/5.0 EncoreLocalMirror/1.0',
            'Accept' => 'text/html,application/xhtml+xml',
            'Accept-Language' => 'en-US,en;q=0.9',
        ])->timeout((int) config('encore-mirror.timeout', 30))
            ->withOptions([
                'verify' => (bool) config('encore-mirror.verify_ssl', true),
                'allow_redirects' => true,
            ])->get($url);

        $contentType = (string) ($response->header('Content-Type') ?: 'text/html; charset=UTF-8');
        $body = $response->body();

        if (str_contains(strtolower($contentType), 'text/html')) {
            $body = $this->localizeHtml($body, $url);
            $this->storePage($url, $body, $response->status(), $contentType);
        }

        return [
            'body' => $body,
            'status' => $response->status(),
            'content_type' => $contentType,
        ];
    }

    public function warmSite(bool $fresh = false, ?callable $progress = null): array
    {
        @set_time_limit(0);
        $urls = $this->discoverSiteUrls();
        array_unshift($urls, $this->origin() . '/');
        $urls = array_values(array_unique($urls));

        $pages = 0;
        $assets = 0;
        $failed = 0;

        foreach ($urls as $url) {
            try {
                $page = $this->fetchAndCachePage($url, $fresh);
                $pages++;

                foreach ($this->extractAssetUrls($page['body']) as $assetUrl) {
                    try {
                        $this->cacheAsset($assetUrl, $fresh, true);
                        $assets++;
                    } catch (\Throwable) {
                        $failed++;
                    }
                }

                if ($progress) {
                    $progress($url, $pages, $assets, $failed);
                }
            } catch (\Throwable) {
                $failed++;
                if ($progress) {
                    $progress($url, $pages, $assets, $failed);
                }
            }
        }

        return compact('pages', 'assets', 'failed');
    }

    public function clearCache(): void
    {
        $root = $this->cacheRoot();
        if (! is_dir($root)) {
            return;
        }

        $iterator = new \RecursiveIteratorIterator(
            new \RecursiveDirectoryIterator($root, \FilesystemIterator::SKIP_DOTS),
            \RecursiveIteratorIterator::CHILD_FIRST
        );

        foreach ($iterator as $item) {
            $item->isDir() ? @rmdir($item->getPathname()) : @unlink($item->getPathname());
        }

        @rmdir($root);
    }

    public function extractAssetUrls(string $content): array
    {
        preg_match_all('#/__encore/asset/([A-Za-z0-9_-]+)/([a-f0-9]{64})#i', $content, $matches, PREG_SET_ORDER);
        $urls = [];

        foreach ($matches as $match) {
            $url = $this->decodeSignedAsset($match[1], strtolower($match[2]));
            if ($url !== null) {
                $urls[$url] = true;
            }
        }

        return array_keys($urls);
    }

    private function discoverSiteUrls(): array
    {
        $originHost = $this->normalizedHost((string) parse_url($this->origin(), PHP_URL_HOST));
        $queue = [$this->origin() . '/sitemap.xml'];
        $seenSitemaps = [];
        $urls = [];
        $maxPages = max(1, (int) config('encore-mirror.max_pages', 5000));

        while ($queue !== [] && count($urls) < $maxPages) {
            $sitemap = array_shift($queue);
            if (isset($seenSitemaps[$sitemap])) {
                continue;
            }
            $seenSitemaps[$sitemap] = true;

            try {
                $response = Http::timeout((int) config('encore-mirror.timeout', 30))
                    ->withOptions(['verify' => (bool) config('encore-mirror.verify_ssl', true)])
                    ->get($sitemap);
            } catch (\Throwable) {
                continue;
            }

            if (! $response->successful()) {
                continue;
            }

            preg_match_all('#<loc>\s*(.*?)\s*</loc>#is', $response->body(), $matches);
            foreach ($matches[1] ?? [] as $location) {
                $location = html_entity_decode(trim(strip_tags($location)), ENT_QUOTES | ENT_XML1);
                if (! preg_match('#^https?://#i', $location)) {
                    continue;
                }

                if (preg_match('/\.xml(?:$|\?)/i', $location)) {
                    $queue[] = $location;
                    continue;
                }

                $host = $this->normalizedHost((string) parse_url($location, PHP_URL_HOST));
                if ($host === $originHost) {
                    $urls[$location] = true;
                    if (count($urls) >= $maxPages) {
                        break;
                    }
                }
            }
        }

        return array_keys($urls);
    }

    private function rewriteCssReferences(string $css, string $baseUrl): string
    {
        $css = preg_replace_callback(
            '#url\(\s*(["\']?)(.*?)\1\s*\)#is',
            function (array $match) use ($baseUrl): string {
                $value = trim(html_entity_decode($match[2], ENT_QUOTES));
                $remote = $this->absoluteUrl($value, $baseUrl);

                if ($remote === null) {
                    return $match[0];
                }

                return 'url(' . $match[1] . $this->assetRoute($remote) . $match[1] . ')';
            },
            $css
        ) ?? $css;

        return preg_replace_callback(
            '#@import\s+(["\'])(.*?)\1#is',
            function (array $match) use ($baseUrl): string {
                $remote = $this->absoluteUrl(trim($match[2]), $baseUrl);

                return $remote === null
                    ? $match[0]
                    : '@import ' . $match[1] . $this->assetRoute($remote) . $match[1];
            },
            $css
        ) ?? $css;
    }

    private function rewriteJavaScriptImports(string $js, string $baseUrl): string
    {
        return preg_replace_callback(
            '#\b(from\s+|import\s*\(\s*|import\s+)(["\'])(\.?\.?/[^"\']+|/[^"\']+|https?://[^"\']+|//[^"\']+)\2#i',
            function (array $match) use ($baseUrl): string {
                $remote = $this->absoluteUrl($match[3], $baseUrl);

                return $remote === null
                    ? $match[0]
                    : $match[1] . $match[2] . $this->assetRoute($remote) . $match[2];
            },
            $js
        ) ?? $js;
    }

    private function linkTagLoadsAsset(string $tag): bool
    {
        if (! preg_match('#\brel=(["\'])(.*?)\1#is', $tag, $match)) {
            return false;
        }

        $rel = strtolower($match[2]);

        return preg_match('/(?:stylesheet|icon|preload|prefetch|modulepreload|manifest)/', $rel) === 1;
    }

    private function isStaticAssetCandidate(string $url): bool
    {
        if (preg_match('#^/(?:cdn|assets|fonts|files|wpm|shopifycloud|services)/#i', $url)) {
            return true;
        }

        $path = (string) parse_url(str_starts_with($url, '//') ? 'https:' . $url : $url, PHP_URL_PATH);

        return preg_match('/\.(?:css|js|mjs|jpg|jpeg|png|gif|webp|avif|svg|ico|woff2?|ttf|otf|eot|mp4|webm|mov|m4v|mp3|wav|json)(?:$|\?)/i', $path) === 1;
    }

    private function absoluteUrl(string $value, string $baseUrl): ?string
    {
        $value = trim($value);

        if ($value === '' || str_starts_with($value, self::BASE_MARKER) || preg_match('#^(?:data:|blob:|javascript:|mailto:|tel:|#)#i', $value)) {
            return null;
        }

        if (preg_match('#^https?://#i', $value)) {
            return $this->stripFragment($value);
        }

        $base = parse_url($baseUrl);
        if (! is_array($base) || empty($base['host'])) {
            return null;
        }

        $scheme = $base['scheme'] ?? 'https';
        $authority = $scheme . '://' . $base['host'] . (isset($base['port']) ? ':' . $base['port'] : '');

        if (str_starts_with($value, '//')) {
            return $this->stripFragment($scheme . ':' . $value);
        }

        if (str_starts_with($value, '/')) {
            return $this->stripFragment($authority . $value);
        }

        $basePath = $base['path'] ?? '/';
        $directory = str_ends_with($basePath, '/') ? $basePath : dirname($basePath) . '/';
        $path = $directory . $value;
        $segments = [];

        foreach (explode('/', $path) as $segment) {
            if ($segment === '' || $segment === '.') {
                continue;
            }
            if ($segment === '..') {
                array_pop($segments);
                continue;
            }
            $segments[] = $segment;
        }

        return $this->stripFragment($authority . '/' . implode('/', $segments));
    }

    private function stripFragment(string $url): string
    {
        return preg_replace('/#.*$/', '', $url) ?? $url;
    }

    private function normalizedHost(string $host): string
    {
        return strtolower((string) preg_replace('/^www\./i', '', $host));
    }

    private function signatureSecret(): string
    {
        $secret = (string) config('app.key', '');

        return $secret !== '' ? $secret : 'encore-local-mirror';
    }

    private function assetPaths(string $remoteUrl): array
    {
        $hash = hash('sha256', $remoteUrl);
        $pathPart = (string) parse_url($remoteUrl, PHP_URL_PATH);
        $extension = strtolower((string) pathinfo($pathPart, PATHINFO_EXTENSION));
        $extension = preg_match('/^[a-z0-9]{1,8}$/', $extension) ? $extension : 'bin';
        $directory = $this->cacheRoot() . '/assets/' . substr($hash, 0, 2);

        return [
            $directory . '/' . $hash . '.' . $extension,
            $directory . '/' . $hash . '.json',
        ];
    }

    private function guessContentType(string $url): string
    {
        $extension = strtolower((string) pathinfo((string) parse_url($url, PHP_URL_PATH), PATHINFO_EXTENSION));

        return match ($extension) {
            'css' => 'text/css; charset=UTF-8',
            'js', 'mjs' => 'application/javascript; charset=UTF-8',
            'svg' => 'image/svg+xml',
            'png' => 'image/png',
            'jpg', 'jpeg' => 'image/jpeg',
            'gif' => 'image/gif',
            'webp' => 'image/webp',
            'avif' => 'image/avif',
            'woff' => 'font/woff',
            'woff2' => 'font/woff2',
            'ttf' => 'font/ttf',
            'otf' => 'font/otf',
            'mp4' => 'video/mp4',
            'webm' => 'video/webm',
            default => 'application/octet-stream',
        };
    }

    private function ensureDirectory(string $directory): void
    {
        if (! is_dir($directory) && ! mkdir($directory, 0775, true) && ! is_dir($directory)) {
            throw new RuntimeException('Unable to create mirror directory: ' . $directory);
        }
    }

    private function basePathShim(): string
    {
        return <<<'HTML'
<script id="encore-local-basepath">
(function () {
    var marker = '__ENCORE_BASE__';
    var script = document.getElementById('encore-local-basepath');
    var src = script && script.ownerDocument ? script.ownerDocument.location.pathname : '/';
    var publicIndex = src.indexOf('/public/');
    var base = publicIndex >= 0 ? src.substring(0, publicIndex + 7) : '';

    function local(url) {
        if (typeof url !== 'string') return url;
        if (url.indexOf(marker) === 0) return base + url.substring(marker.length + (base.endsWith('/') ? 1 : 0));
        if (url.charAt(0) === '/' && base && url.indexOf(base + '/') !== 0) return base + url;
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
