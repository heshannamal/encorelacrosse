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
| Encore Lacrosse local storefront mirror
|--------------------------------------------------------------------------
|
| HTML is mirrored from encorelacrosse.com, while CSS, JavaScript, fonts,
| images and video are downloaded into this Laravel project's storage cache
| and served through /__encore/asset. The browser no longer needs Shopify/CDN
| URLs for the storefront presentation.
|
*/

Route::withoutMiddleware([
    EncryptCookies::class,
    AddQueuedCookiesToResponse::class,
    StartSession::class,
    ShareErrorsFromSession::class,
    ValidateCsrfToken::class,
])->group(function () {
    Route::get('/__encore/asset/{encoded}/{signature}', [EncoreMirrorController::class, 'asset'])
        ->where('encoded', '[A-Za-z0-9_-]+')
        ->where('signature', '[a-fA-F0-9]{64}')
        ->name('encore.asset');

    Route::any('/', [EncoreMirrorController::class, 'handle'])->name('home');

    $legacyNamedRoutes = [
        'shop/mens-tops' => 'shop.mens-tops',
        'shop/mens-bottoms' => 'shop.mens-bottoms',
        'shop/womens-tops' => 'shop.womens-tops',
        'shop/womens-bottoms' => 'shop.womens-bottoms',
        'shop/hats' => 'shop.hats',
        'shop/bags' => 'shop.bags',
        'teamwear' => 'teamwear.allTeamwear',
        'teamwear/mensGameJerseys' => 'teamwear.mensGameJerseys',
        'teamwear/mensShorts' => 'teamwear.mensShorts',
        'teamwear/mensShooters' => 'teamwear.mensShooters',
        'teamwear/mensReversibles' => 'teamwear.mensReversibles',
        'teamwear/womensRacerbacks' => 'teamwear.womensRacerbacks',
        'teamwear/womensShortsKilts' => 'teamwear.womensShortsKilts',
        'teamwear/womensShooters' => 'teamwear.womensShooters',
        'teamwear/outerwear' => 'teamwear.outerwear',
        'teamwear/hoodies' => 'teamwear.hoodies',
        'teamwear/joggersSweats' => 'teamwear.joggersSweats',
        'teamwear/lpp' => 'teamwear.lpp',
        'custom/team-stores' => 'custom.teamStores',
        'custom/custom-graphic-design' => 'custom.customGraphicDesign',
        'custom/sizing-charts' => 'custom.sizingCharts',
        'custom/fabric' => 'custom.fabric',
        'custom/embellishment' => 'custom.embellishment',
        'events/battle-of-the-bay' => 'events.battleOfTheBay',
        'events/impact10-showcase' => 'events.impact10Showcase',
        'events/hawaii-youth-lacrosse-classic' => 'events.hawaiiYouthLacrosseClassic',
        'events/las-vegas-lacrosse-showcase' => 'events.lasVegasLacrosseShowcase',
        'events/kings-showcase' => 'events.kingsShowcase',
        'events/buffalo-wings-box-lacrosse' => 'events.buffaloWingsBoxLacrosse',
        'international' => 'international.index',
        'international/sri-lanka' => 'international.sriLanka',
        'international/philippines' => 'international.philippines',
        'international/ecuador' => 'international.ecuador',
        'international/uganda' => 'international.uganda',
        'international/japan' => 'international.japan',
        'international/berlin' => 'international.berlin',
        'international/colombia' => 'international.colombia',
        'international/trinidad-and-tobago' => 'international.trinidadAndTobago',
        'about' => 'about',
        'private-training' => 'privateTraining',
    ];

    foreach ($legacyNamedRoutes as $uri => $name) {
        Route::any('/' . $uri, [EncoreMirrorController::class, 'handle'])->name($name);
    }

    Route::any('/{path?}', [EncoreMirrorController::class, 'handle'])
        ->where('path', '.*')
        ->name('encore.mirror');
});
