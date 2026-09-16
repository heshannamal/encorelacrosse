<?php

namespace App\Http\Controllers;

use Illuminate\Http\Client\PendingRequest;
use Illuminate\Http\Client\Response as HttpResponse;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Str;

class EncoreMirrorController extends Controller
{
    /**
     * Legacy Laravel URLs that existed before the storefront mirror was enabled.
     * They are mapped to the equivalent Shopify page so old bookmarks continue
     * to display the same content as encorelacrosse.com.
     */
    private array $legacyPathMap = [
        'shop/mens-tops' => 'pages/mens-tops',
        'shop/mens-bottoms' => 'pages/mens-bottoms',
        'shop/womens-tops' => 'pages/womens-top',
        'shop/womens-bottoms' => 'pages/womens-bottoms',
        'shop/hats' => 'pages/hats',
        'shop/bags' => 'pages/bags',

        'teamwear' => 'pages/team-wear',
        'teamwear/mensGameJerseys' => 'pages/mens-game-jerseys',
        'teamwear/mensShorts' => 'pages/mens-shorts',
        'teamwear/mensShooters' => 'pages/mens-shooter-shirts',
        'teamwear/mensReversibles' => 'pages/mens-reversibles',
        'teamwear/womensRacerbacks' => 'pages/womens-racerbacks',
        'teamwear/womensShortsKilts' => 'pages/womens-shorts-and-kilts',
        'teamwear/womensShooters' => 'pages/womens-shooters',
        'teamwear/outerwear' => 'pages/outerwear',
        'teamwear/hoodies' => 'pages/hoodies',
        'teamwear/joggersSweats' => 'pages/joggers-and-sweatpants',
        'teamwear/lpp' => 'pages/lpp',

        'custom/team-stores' => 'pages/team-store',
        'custom/custom-graphic-design' => 'pages/custom-graphic-design',
        'custom/sizing-charts' => 'pages/sizing-guidelines',
        'custom/fabric' => 'pages/fabrics',
        'custom/embellishment' => 'pages/embellishment',

        'events/battle-of-the-bay' => 'pages/battle-of-the-bay',
        'events/impact10-showcase' => 'pages/impact10-showcase',
        'events/hawaii-youth-lacrosse-classic' => 'pages/hawaii-youth-lacrosse-classic',
        'events/las-vegas-lacrosse-showcase' => 'pages/las-vegas-lacrosse-showcase',
        'events/kings-showcase' => 'pages/kings-showcase',
        'events/buffalo-wings-box-lacrosse' => 'pages/buffalo-wings-box-lacrosse',

        'international' => 'pages/international',
        'international/sri-lanka' => 'pages/sri-lanka',
        'international/philippines' => 'pages/philippines',
        'international/ecuador' => 'pages/ecuador',
        'international/uganda' => 'pages/uganda',
        'international/japan' => 'pages/japan',
        'international/berlin' => 'pages/berlin',
        'international/colombia' => 'pages/colombia',
        'international/trinidad-and-tobago' => 'pages/trinidad-tobago-lacrosse',

        'about' => 'pages/about',
        'private-training' => 'pages/private-training',
    ];

    public function handle(Request $request, ?path = null): Response
    {
        $origin = rtrim((string) config('encore-mirror.origin', 'https://encorelacrosse.com'), '/');
        $path = $path === null ? trim($request->path(), '/') : trim($path, '/');
        $path = $this->legacyPathMap[$path] ?? $path;

        $url = $origin . ($path !== '' ? '/' . $path : '/');

        if ($request->getQueryString()) {
            $url .= '?' . $request->getQueryString();
        }

        try {
            $upstream = $this->sendUpstreamRequest($request, $url, $origin);
        } catch (\Throwable $e) {
            report($e);

            return response(
                $this->offlineMessage($url),
                502,
                ['Content-Type' => 'text/html; charset=UTF-8']
            );
        }

        return $this->buildResponse($request, $upstream, $origin);
    }

    private function sendUpstreamRequest(Request $request, string $url, string $origin): HttpResponse
    {
        $headers = [
            'Accept' => $request->header('Accept', '*/*'),
            'Accept-Language' => $request->header('Accept-Language', 'en-US,en;q=0.9'),
            'User-Agent' => $request->userAgent() ?: 'Mozilla/5.0 EncoreMirror/1.0',
            'Referer' => $origin . '/',
        ];

        foreach (['X-Requested-With', 'X-Section-Id', 'X-Section-Ids', 'Shopify-Storefront-Private-Token'] as $header) {
            if ($request->hasHeader($header)) {
                $headers[$header] = $request->header($header);
            }
        }

        if ($request->hasHeader('Cookie')) {
            $headers['Cookie'] = $request->header('Cookie');
        }

        /** @var PendingRequest $client */
        $client = Http::withHeaders($headers)
            ->timeout((int) config('encore-mirror.timeout', 30))
            ->withOptions([
                'allow_redirects' => false,
                'verify' => (bool) config('encore-mirror.verify_ssl', true),
            ]);

        $method = strtoupper($request->method());
        $options = [];

        if (! in_array($method, ['GET', 'HEAD'], true)) {
            $contentType = $request->header('Content-Type');
            $body = $request->getContent();

            if ($body !== '') {
                $client = $client->withBody($body, $contentType ?: 'application/octet-stream');
            } elseif ($request->all()) {
                // PHP may consume a traditional form body before getContent() is read.
                $options['form_params'] = $request->all();
            }
        }

        return $client->send($method, $url, $options);
    }

    private function buildResponse(Request $request, HttpResponse $upstream, string $origin): Response
    {
        $contentType = $upstream->header('Content-Type') ?: 'text/html; charset=UTF-8';
        $body = $upstream->body();

        if (Str::contains(Str::lower($contentType), 'text/html')) {
            $body = $this->rewriteHtml($request, $body, $origin);
        }

        $response = response($body, $upstream->status());
        $response->headers->set('Content-Type', $contentType);

        foreach (['Cache-Control', 'ETag', 'Last-Modified', 'Vary'] as $header) {
            $value = $upstream->header($header);
            if ($value) {
                $response->headers->set($header, $value);
            }
        }

        if ($location = $upstream->header('Location')) {
            $response->headers->set('Location', $this->rewriteLocation($request, $location, $origin));
        }

        // Keep Shopify cart/session cookies usable on the Laravel host. Domain is
        // removed so the browser treats the cookie as belonging to this clone.
        $setCookies = $upstream->headers()['Set-Cookie'] ?? [];
        foreach ($setCookies as $cookie) {
            $cookie = preg_replace('/;\s*Domain=[^;]+/i', '', $cookie) ?? $cookie;

            if (! $request->isSecure()) {
                $cookie = preg_replace('/;\s*Secure/i', '', $cookie) ?? $cookie;
            }

            $response->headers->set('Set-Cookie', $cookie, false);
        }

        return $response;
    }

    private function rewriteHtml(Request $request, string $html, string $origin): string
    {
        $basePath = rtrim($request->getBaseUrl(), '/');

        // Absolute links back to the source storefront should stay inside the clone.
        $quotedOrigin = preg_quote($origin, '#');
        $html = preg_replace_callback(
            '#(href|action)=([\'\"])' . $quotedOrigin . '(/[^\'\"]*)\2#i',
            fn (array $m) => $m[1] . '=' . $m[2] . $this->localPath($basePath, $m[3]) . $m[2],
            $html
        ) ?? $html;

        // Navigation/forms use the local Laravel clone. Static/media source URLs are
        // left on the source domain/CDN so animations, fonts, videos and imagery are
        // identical to the production Shopify site.
        $html = preg_replace_callback(
            '#\b(href|action)=([\'\"])(/(?!/)[^\'\"]*)\2#i',
            function (array $m) use ($basePath, $origin) {
                $path = $m[3];

                if ($this->isAssetPath($path)) {
                    return $m[1] . '=' . $m[2] . $origin . $path . $m[2];
                }

                return $m[1] . '=' . $m[2] . $this->localPath($basePath, $path) . $m[2];
            },
            $html
        ) ?? $html;

        $html = preg_replace_callback(
            '#\b(src|poster|data-src|data-video-src)=([\'\"])(/(?!/)[^\'\"]*)\2#i',
            fn (array $m) => $m[1] . '=' . $m[2] . $origin . $m[3] . $m[2],
            $html
        ) ?? $html;

        // Shopify often emits root-relative entries inside srcset attributes.
        $html = preg_replace_callback(
            '#\b(srcset|data-srcset)=([\'\"])([^\'\"]*)\2#i',
            function (array $m) use ($origin) {
                $value = preg_replace('#(^|,\s*)(/[^,\s]+)#', '$1' . $origin . '$2', $m[3]) ?? $m[3];
                return $m[1] . '=' . $m[2] . $value . $m[2];
            },
            $html
        ) ?? $html;

        // On WAMP the project is commonly opened from /encorelacrosse.com/public.
        // Shopify JavaScript expects a domain-root install. This small compatibility
        // shim makes fetch/XHR/beacon calls honor Laravel's base path without touching
        // the original Shopify theme JavaScript.
        if ($basePath !== '') {
            $shim = $this->basePathShim($basePath);
            $html = preg_replace('/<head(\s[^>]*)?>/i', '$0' . $shim, $html, 1) ?? $html;
        }

        return $html;
    }

    private function localPath(string $basePath, string $path): string
    {
        if ($basePath === '') {
            return $path;
        }

        if ($path === '/') {
            return $basePath . '/';
        }

        if (Str::startsWith($path, $basePath . '/')) {
            return $path;
        }

        return $basePath . $path;
    }

    private function isAssetPath(string $path): bool
    {
        return Str::startsWith($path, [
            '/cdn/',
            '/wpm/',
            '/shopifycloud/',
            '/services/',
            '/assets/',
            '/fonts/',
        ]);
    }

    private function rewriteLocation(Request $request, string $location, string $origin): string
    {
        $basePath = rtrim($request->getBaseUrl(), '/');

        if (Str::startsWith($location, $origin)) {
            $location = Str::after($location, $origin);
        }

        if (Str::startsWith($location, '/') && ! Str::startsWith($location, '//')) {
            return $this->localPath($basePath, $location);
        }

        return $location;
    }

    private function basePathShim(string $basePath): string
    {
        $base = json_encode($basePath, JSON_UNESCAPED_SLASHES | JSON_UNESCAPED_UNICODE);

        return <<<HTML
<script id="encore-mirror-basepath">
(function () {
    var base = {$base};
    if (!base) return;

    function fix(url) {
        if (typeof url !== 'string') return url;
        if (url.indexOf('//') === 0) return url;
        if (url.indexOf('/') === 0 && url.indexOf(base + '/') !== 0 && url !== base) {
            return base + url;
        }
        return url;
    }

    if (window.fetch) {
        var nativeFetch = window.fetch.bind(window);
        window.fetch = function (input, init) {
            if (typeof input === 'string') {
                input = fix(input);
            } else if (input && input.url) {
                try {
                    var parsed = new URL(input.url, window.location.href);
                    if (parsed.origin === window.location.origin && parsed.pathname.indexOf(base + '/') !== 0) {
                        input = new Request(base + parsed.pathname + parsed.search + parsed.hash, input);
                    }
                } catch (e) {}
            }
            return nativeFetch(input, init);
        };
    }

    var nativeOpen = XMLHttpRequest.prototype.open;
    XMLHttpRequest.prototype.open = function (method, url) {
        arguments[1] = fix(url);
        return nativeOpen.apply(this, arguments);
    };

    if (navigator.sendBeacon) {
        var nativeBeacon = navigator.sendBeacon.bind(navigator);
        navigator.sendBeacon = function (url, data) {
            return nativeBeacon(fix(url), data);
        };
    }
})();
</script>
HTML;
    }

    private function offlineMessage(string $url): string
    {
        $safeUrl = e($url);

        return <<<HTML
<!doctype html>
<html lang="en">
<head><meta charset="utf-8"><meta name="viewport" content="width=device-width,initial-scale=1"><title>Encore Lacrosse</title></head>
<body style="margin:0;font-family:Arial,sans-serif;background:#f7f7f7;color:#222;display:grid;place-items:center;min-height:100vh">
<div style="max-width:620px;padding:36px;background:#fff;box-shadow:0 12px 36px rgba(0,0,0,.08);text-align:center">
<h1 style="margin-top:0">Encore Lacrosse storefront is temporarily unavailable</h1>
<p>The Laravel clone could not reach the source storefront at <strong>{$safeUrl}</strong>.</p>
<p>Check the internet connection and the ENCORE_MIRROR_* settings, then refresh.</p>
</div>
</body>
</html>
HTML;
    }
}
