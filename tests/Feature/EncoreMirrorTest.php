<?php

namespace Tests\Feature;

use Illuminate\Http\Client\Request as ClientRequest;
use Illuminate\Support\Facades\Http;
use Tests\TestCase;

class EncoreMirrorTest extends TestCase
{
    public function test_homepage_uses_source_storefront_html_and_assets(): void
    {
        Http::fake([
            'https://encorelacrosse.com/' => Http::response(
                '<!doctype html><html><head><link rel="stylesheet" href="/cdn/theme.css"></head><body><a href="/pages/about">About</a><img src="/cdn/hero.jpg"><form action="/cart/add"></form></body></html>',
                200,
                ['Content-Type' => 'text/html; charset=UTF-8']
            ),
        ]);

        $response = $this->get('/');

        $response->assertOk();
        $response->assertSee('href="/pages/about"', false);
        $response->assertSee('href="https://encorelacrosse.com/cdn/theme.css"', false);
        $response->assertSee('src="https://encorelacrosse.com/cdn/hero.jpg"', false);
        $response->assertSee('action="/cart/add"', false);

        Http::assertSent(fn (ClientRequest $request) => $request->url() === 'https://encorelacrosse.com/');
    }

    public function test_legacy_laravel_urls_map_to_the_matching_storefront_pages(): void
    {
        Http::fake([
            'https://encorelacrosse.com/pages/mens-tops' => Http::response(
                '<html><head></head><body>Mens Tops</body></html>',
                200,
                ['Content-Type' => 'text/html']
            ),
        ]);

        $this->get('/shop/mens-tops')
            ->assertOk()
            ->assertSee('Mens Tops');

        Http::assertSent(fn (ClientRequest $request) => $request->url() === 'https://encorelacrosse.com/pages/mens-tops');
    }

    public function test_shopify_ajax_posts_are_proxied_without_laravel_csrf(): void
    {
        Http::fake([
            'https://encorelacrosse.com/cart/add.js' => Http::response(
                '{"id":123,"quantity":1}',
                200,
                ['Content-Type' => 'application/json']
            ),
        ]);

        $response = $this->postJson('/cart/add.js', [
            'id' => 123,
            'quantity' => 1,
        ]);

        $response->assertOk();
        $this->assertSame('application/json', $response->headers->get('Content-Type'));

        Http::assertSent(fn (ClientRequest $request) => $request->url() === 'https://encorelacrosse.com/cart/add.js');
    }
}
