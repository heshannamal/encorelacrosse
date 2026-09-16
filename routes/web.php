<?php

use App\Http\Controllers\EncoreMirrorController;
use Illuminate\Cookie\Middleware\AddQueuedCookiesToResponse;
use Illuminate\Cookie\Middleware\EncryptCookies;
use Illuminate\Foundation\Http\Middleware\ValidateCsrfToken;
use Illuminate\Session\Middleware\StartSession;
use Illuminate\Support\Facades\Route;
use Illuminate\View\Middleware\ShareErrorsFromSession;

/*
|--------------------------------------------------------------------------
| Encore Lacrosse storefront mirror
|--------------------------------------------------------------------------
|
| encorelacrosse.com is the visual/source storefront for this Laravel copy.
| The mirror controller returns the same public Shopify HTML and keeps the
| original public CSS/JS/CDN assets, so every page, responsive layout and
| front-end animation stays in sync with the source site.
|
| Existing Laravel URLs are kept as named routes for backwards compatibility;
| EncoreMirrorController maps them to their equivalent /pages/... URLs.
|
| Shopify owns the storefront cookies, forms and AJAX payloads. Laravel's web
| cookie/session/CSRF middleware is removed only from the mirror routes so it
| does not encrypt Shopify cart cookies or reject Shopify form submissions.
|
*/

Route::withoutMiddleware([
    EncryptCookies::class,
    AddQueuedCookiesToResponse::class,
    StartSession::class,
    ShareErrorsFromSession::class,
    ValidateCsrfToken::class,
])->group(function () {
    Route::any('/', [EncoreMirrorController::class, 'handle'])->name('home');

    Route::prefix('shop')->name('shop.')->group(function () {
        Route::any('/mens-tops', [EncoreMirrorController::class, 'handle'])->name('mens-tops');
        Route::any('/mens-bottoms', [EncoreMirrorController::class, 'handle'])->name('mens-bottoms');
        Route::any('/womens-tops', [EncoreMirrorController::class, 'handle'])->name('womens-tops');
        Route::any('/womens-bottoms', [EncoreMirrorController::class, 'handle'])->name('womens-bottoms');
        Route::any('/hats', [EncoreMirrorController::class, 'handle'])->name('hats');
        Route::any('/bags', [EncoreMirrorController::class, 'handle'])->name('bags');
    });

    Route::prefix('teamwear')->name('teamwear.')->group(function () {
        Route::any('/', [EncoreMirrorController::class, 'handle'])->name('allTeamwear');
        Route::any('/mensGameJerseys', [EncoreMirrorController::class, 'handle'])->name('mensGameJerseys');
        Route::any('/mensShorts', [EncoreMirrorController::class, 'handle'])->name('mensShorts');
        Route::any('/mensShooters', [EncoreMirrorController::class, 'handle'])->name('mensShooters');
        Route::any('/mensReversibles', [EncoreMirrorController::class, 'handle'])->name('mensReversibles');
        Route::any('/womensRacerbacks', [EncoreMirrorController::class, 'handle'])->name('womensRacerbacks');
        Route::any('/womensShortsKilts', [EncoreMirrorController::class, 'handle'])->name('womensShortsKilts');
        Route::any('/womensShooters', [EncoreMirrorController::class, 'handle'])->name('womensShooters');
        Route::any('/outerwear', [EncoreMirrorController::class, 'handle'])->name('outerwear');
        Route::any('/hoodies', [EncoreMirrorController::class, 'handle'])->name('hoodies');
        Route::any('/joggersSweats', [EncoreMirrorController::class, 'handle'])->name('joggersSweats');
        Route::any('/lpp', [EncoreMirrorController::class, 'handle'])->name('lpp');
    });

    Route::prefix('custom')->name('custom.')->group(function () {
        Route::any('/team-stores', [EncoreMirrorController::class, 'handle'])->name('teamStores');
        Route::any('/custom-graphic-design', [EncoreMirrorController::class, 'handle'])->name('customGraphicDesign');
        Route::any('/sizing-charts', [EncoreMirrorController::class, 'handle'])->name('sizingCharts');
        Route::any('/fabric', [EncoreMirrorController::class, 'handle'])->name('fabric');
        Route::any('/embellishment', [EncoreMirrorController::class, 'handle'])->name('embellishment');
    });

    Route::prefix('events')->name('events.')->group(function () {
        Route::any('/battle-of-the-bay', [EncoreMirrorController::class, 'handle'])->name('battleOfTheBay');
        Route::any('/impact10-showcase', [EncoreMirrorController::class, 'handle'])->name('impact10Showcase');
        Route::any('/hawaii-youth-lacrosse-classic', [EncoreMirrorController::class, 'handle'])->name('hawaiiYouthLacrosseClassic');
        Route::any('/las-vegas-lacrosse-showcase', [EncoreMirrorController::class, 'handle'])->name('lasVegasLacrosseShowcase');
        Route::any('/kings-showcase', [EncoreMirrorController::class, 'handle'])->name('kingsShowcase');
        Route::any('/buffalo-wings-box-lacrosse', [EncoreMirrorController::class, 'handle'])->name('buffaloWingsBoxLacrosse');
    });

    Route::prefix('international')->name('international.')->group(function () {
        Route::any('/', [EncoreMirrorController::class, 'handle'])->name('index');
        Route::any('/sri-lanka', [EncoreMirrorController::class, 'handle'])->name('sriLanka');
        Route::any('/philippines', [EncoreMirrorController::class, 'handle'])->name('philippines');
        Route::any('/ecuador', [EncoreMirrorController::class, 'handle'])->name('ecuador');
        Route::any('/uganda', [EncoreMirrorController::class, 'handle'])->name('uganda');
        Route::any('/japan', [EncoreMirrorController::class, 'handle'])->name('japan');
        Route::any('/berlin', [EncoreMirrorController::class, 'handle'])->name('berlin');
        Route::any('/colombia', [EncoreMirrorController::class, 'handle'])->name('colombia');
        Route::any('/trinidad-and-tobago', [EncoreMirrorController::class, 'handle'])->name('trinidadAndTobago');
    });

    Route::any('/about', [EncoreMirrorController::class, 'handle'])->name('about');
    Route::any('/private-training', [EncoreMirrorController::class, 'handle'])->name('privateTraining');

    /*
    | Catch every Shopify-style route: /pages, /products, /collections, /cart,
    | /search, section-rendering endpoints, JSON/AJAX requests, and future pages
    | added to encorelacrosse.com without needing another Laravel route.
    */
    Route::any('/{path?}', [EncoreMirrorController::class, 'handle'])
        ->where('path', '.*')
        ->name('encore.mirror');
});
