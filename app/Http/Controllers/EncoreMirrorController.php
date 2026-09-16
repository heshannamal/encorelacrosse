<?php

namespace App\Http\Controllers;

use App\Services\EncoreMirrorService;
use Illuminate\Http\Client\PendingRequest;
use Illuminate\Http\Client\Response as HttpResponse;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\Http;
use Symfony\Component\HttpFoundation\BinaryFileResponse;

class EncoreMirrorController extends Controller
{
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
        'teamwear/womensShooters' => 'pages/womens-shooter-shirts',
        'teamwear/outerwear' => 'pages/outerwear',
        'teamwear/hoodies' => 'pages/hoodies',
        'teamwear/joggersSweats' => 'pages/joggers-and-sweatpants',
        'teamwear/lpp' => 'pages/lpp',
        'custom/team-stores' => 'pages/team-store',
        'custom/custom-graphic-design' => 'pages/custom-graphic-design',
        'custom/sizing-charts' => 'pages/sizing',
        'custom/fabric' => 'pages/fabric',
        'custom/embellishment' => 'pages/embellishment',
        'events/battle-of-the-bay' => 'pages/battle-of-the-bay',
        'events/impact10-showcase' => 'pages/impact10-showcase',
        'events/hawaii-youth-lacrosse-classic' => 'pages/hawaii-youth-lacrosse-classic',
        'events/las-vegas-lacrosse-showcase' => 'pages/las-vegas-ls',
        'events/kings-showcase' => 'pages/kings-showcase',
        'events/buffalo-wings-box-lacrosse' => 'pages/box-lacrosse',
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

    public function __construct(private readonly EncoreMirrorService $mirror)
    {
    }

    public function handle(Request $request, ?string $path = null): Response
    {
        $origin = $this->mirror->origin();
        $path = $path === null ? trim($request->path(), '/') : trim($path, '/');
        $path = $this->legacyPathMap[$path] ?? $path;
        $url = $origin . ($path !== '' ? '/' . $path : '/');

        if ($request->getQueryString()) {
            $url .= '?' . $request->getQueryString();
        }

        if (in_array(strtoupper($request->method()), ['GET', 'HEAD'], true)) {
            $cached = $this->mirror->cachedPage($url);
            if ($cached !== null) {
                $body = $this->mirror->applyBasePath($cached['body'], $request->getBaseUrl());
                return response($body, $cached['status'], ['Content-Type' => $cached['content_type']]);
            }
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

        return $this->buildResponse($request, $upstream, $origin, $url);
    }

    public function asset(Request $request, string $encoded, string $signature): Response|BinaryFileResponse
    {
        $remoteUrl = $this->mirror->decodeSignedAsset($encoded, strtolower($signature));
        abort_if($remoteUrl === null, 403, 'Invalid Encore asset signature.');

        try {
            $asset = $this->mirror->cacheAsset($remoteUrl);
        } catch (\Throwable $e) {
            report($e);
            abort(502, 'Unable to download Encore asset.');
        }

        $contentType = strtolower($asset['content_type']);
        $headers = [
            'Content-Type' => $asset['content_type'],
            'Cache-Control' => 'public, max-age=31536000, immutable',
            'Access-Control-Allow-Origin' => '*',
        ];

        if (str_contains($contentType, 'text/css') || str_contains($contentType, 'javascript')) {
            $body = (string) file_get_contents($asset['path']);
            $body = $this->mirror->applyBasePath($body, $request->getBaseUrl());

            return response($body, 200, $headers);
        }

        return response()->file($asset['path'], $headers);
    }

    private function sendUpstreamRequest(Request $request, string $url, string $origin): HttpResponse
    {
        $headers = [
            'Accept' => $request->header('Accept', '*/*'),
            'Accept-Language' => $request->header('Accept-Language', 'en-US,en;q=0.9'),
            'User-Agent' => $request->userAgent() ?: 'Mozilla/5.0 EncoreLocalMirror/1.0',
            'Referer' => $origin . '/',
        ];

        if ($request->hasHeader('Origin')) {
            $headers['Origin'] = $origin;
        }

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
                $options['form_params'] = $request->all();
            }
        }

        return $client->send($method, $url, $options);
    }

    private function buildResponse(Request $request, HttpResponse $upstream, string $origin, string $url): Response
    {
        $contentType = (string) ($upstream->header('Content-Type') ?: 'text/html; charset=UTF-8');
        $body = $upstream->body();
        $isHtml = str_contains(strtolower($contentType), 'text/html');

        if ($isHtml) {
            $body = $this->mirror->localizeHtml($body, $url);

            if ($request->isMethod('GET') && $upstream->successful()) {
                $this->mirror->storePage($url, $body, $upstream->status(), $contentType);
            }

            $body = $this->mirror->applyBasePath($body, $request->getBaseUrl());
        }

        $response = response($body, $upstream->status());
        $response->headers->set('Content-Type', $contentType);

        foreach (['Cache-Control', 'ETag', 'Last-Modified', 'Vary', 'Content-Disposition'] as $header) {
            if ($value = $upstream->header($header)) {
                $response->headers->set($header, $value);
            }
        }

        if ($location = $upstream->header('Location')) {
            $response->headers->set('Location', $this->rewriteLocation($request, $location, $origin));
        }

        $upstreamHeaders = $upstream->headers();
        $setCookies = $upstreamHeaders['Set-Cookie'] ?? $upstreamHeaders['set-cookie'] ?? [];
        $basePath = rtrim($request->getBaseUrl(), '/');

        foreach ($setCookies as $cookie) {
            $cookie = preg_replace('/;\s*Domain=[^;]+/i', '', $cookie) ?? $cookie;

            if ($basePath !== '') {
                $cookie = preg_replace('/;\s*Path=\/(?=;|$)/i', '; Path=' . $basePath . '/', $cookie) ?? $cookie;
            }

            if (! $request->isSecure()) {
                $cookie = preg_replace('/;\s*Secure/i', '', $cookie) ?? $cookie;
                $cookie = preg_replace('/;\s*SameSite=None/i', '; SameSite=Lax', $cookie) ?? $cookie;
            }

            $response->headers->set('Set-Cookie', $cookie, false);
        }

        return $response;
    }

    private function rewriteLocation(Request $request, string $location, string $origin): string
    {
        $basePath = rtrim($request->getBaseUrl(), '/');
        $host = (string) parse_url($origin, PHP_URL_HOST);

        if ($host !== '') {
            $location = preg_replace(
                '#^(?:https?:)?//(?:www\.)?' . preg_quote((string) preg_replace('/^www\./i', '', $host), '#') . '#i',
                '',
                $location
            ) ?? $location;
        }

        if (str_starts_with($location, '/') && ! str_starts_with($location, '//')) {
            return $basePath . $location;
        }

        return $location;
    }

    private function offlineMessage(string $url): string
    {
        $safeUrl = e($url);

        return <<<HTML
<!doctype html>
<html lang="en"><head><meta charset="utf-8"><meta name="viewport" content="width=device-width,initial-scale=1"><title>Encore Lacrosse</title></head>
<body style="margin:0;font-family:Arial,sans-serif;background:#f7f7f7;color:#222;display:grid;place-items:center;min-height:100vh">
<div style="max-width:620px;padding:36px;background:#fff;box-shadow:0 12px 36px rgba(0,0,0,.08);text-align:center">
<h1 style="margin-top:0">Encore Lacrosse storefront is temporarily unavailable</h1>
<p>The local copy could not reach the source storefront at <strong>{$safeUrl}</strong>.</p>
<p>If you already ran <code>php artisan encore:mirror-sync</code>, cached pages remain available.</p>
</div></body></html>
HTML;
    }
}
