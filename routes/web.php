<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ShopController;
use App\Http\Controllers\TeamwearController;
use App\Http\Controllers\CustomController;
use App\Http\Controllers\ContactFormController;
use App\Http\Controllers\EventController;
use App\Http\Controllers\InternationalController;
use App\Http\Controllers\InstagramFeedController;

Route::get('/', function () {
    return view('welcome');
})->name('home');

Route::get('/api/instagram-feed', [InstagramFeedController::class, 'index'])
    ->middleware('throttle:60,1')
    ->name('instagram.feed');

/*
|--------------------------------------------------------------------------
| Live Encore URL structure
|--------------------------------------------------------------------------
*/

// Existing lifestyle collection pages.
Route::get('/pages/mens-tops', [ShopController::class, 'mensTops'])->name('shop.mens-tops');
Route::get('/pages/mens-bottoms', [ShopController::class, 'mensBottoms'])->name('shop.mens-bottoms');
Route::get('/pages/womens-top', [ShopController::class, 'womensTops'])->name('shop.womens-tops');
Route::get('/pages/womens-bottoms', [ShopController::class, 'womensBottoms'])->name('shop.womens-bottoms');
Route::get('/pages/hats', [ShopController::class, 'hats'])->name('shop.hats');
Route::get('/pages/bags-encore', [ShopController::class, 'bags'])->name('shop.bags');

// Teamwear
Route::get('/pages/teamwear', [TeamwearController::class, 'allTeamwear'])->name('teamwear.index');
Route::get('/pages/team-wear', [TeamwearController::class, 'allTeamwear'])->name('teamwear.allTeamwear');
Route::get('/pages/mens-game-jerseys', [TeamwearController::class, 'mensGameJerseys'])->name('teamwear.mensGameJerseys');
Route::get('/pages/mens-shorts', [TeamwearController::class, 'mensShorts'])->name('teamwear.mensShorts');
Route::get('/pages/mens-shooter-shirts', [TeamwearController::class, 'mensShooters'])->name('teamwear.mensShooters');
Route::get('/pages/mens-reversibles', [TeamwearController::class, 'mensReversibles'])->name('teamwear.mensReversibles');
Route::get('/pages/womens-game-jerseys', [TeamwearController::class, 'womensRacerbacks'])->name('teamwear.womensRacerbacks');
Route::get('/pages/womens-shorts-and-kilts', [TeamwearController::class, 'womensShortsKilts'])->name('teamwear.womensShortsKilts');
Route::get('/pages/womens-shooter-shirts', [TeamwearController::class, 'womensShooters'])->name('teamwear.womensShooters');
Route::get('/pages/outerwear', [TeamwearController::class, 'outerwear'])->name('teamwear.outerwear');
Route::get('/pages/hoodies', [TeamwearController::class, 'hoodies'])->name('teamwear.hoodies');
Route::get('/pages/joggers-and-sweatpants', [TeamwearController::class, 'joggersSweats'])->name('teamwear.joggersSweats');
Route::get('/pages/lpp', [TeamwearController::class, 'lpp'])->name('teamwear.lpp');

// Custom
Route::get('/pages/team-store', [CustomController::class, 'teamStores'])->name('custom.teamStores');
Route::get('/pages/custom-graphic-design', [CustomController::class, 'customGraphicDesign'])->name('custom.customGraphicDesign');
Route::get('/pages/sizing', [CustomController::class, 'sizingCharts'])->name('custom.sizingCharts');
Route::get('/pages/fabric', [CustomController::class, 'fabric'])->name('custom.fabric');
Route::get('/pages/embellishment', [CustomController::class, 'embellishment'])->name('custom.embellishment');

// Events
Route::get('/pages/battle-of-the-bay', [EventController::class, 'battleOfTheBay'])->name('events.battleOfTheBay');
Route::get('/pages/impact10-showcase', [EventController::class, 'impact10Showcase'])->name('events.impact10Showcase');
Route::get('/pages/hawaii-youth-lacrosse-classic', [EventController::class, 'hawaiiYouthLacrosseClassic'])->name('events.hawaiiYouthLacrosseClassic');
Route::get('/pages/las-vegas-ls', [EventController::class, 'lasVegasLacrosseShowcase'])->name('events.lasVegasLacrosseShowcase');
Route::get('/pages/kings-showcase', [EventController::class, 'kingsShowcase'])->name('events.kingsShowcase');
Route::get('/pages/box-lacrosse', [EventController::class, 'buffaloWingsBoxLacrosse'])->name('events.buffaloWingsBoxLacrosse');

// International
Route::get('/pages/international', [InternationalController::class, 'sriLanka'])->name('international.index');
Route::get('/pages/sri-lanka', [InternationalController::class, 'sriLanka'])->name('international.sriLanka');
Route::get('/pages/philippines', [InternationalController::class, 'philippines'])->name('international.philippines');
Route::get('/pages/ecuador', [InternationalController::class, 'ecuador'])->name('international.ecuador');
Route::get('/pages/uganda', [InternationalController::class, 'uganda'])->name('international.uganda');
Route::get('/pages/japan', [InternationalController::class, 'japan'])->name('international.japan');
Route::get('/pages/berlin', [InternationalController::class, 'berlin'])->name('international.berlin');
Route::get('/pages/colombia', [InternationalController::class, 'colombia'])->name('international.colombia');
Route::get('/pages/trinidad-tobago-lacrosse', [InternationalController::class, 'trinidadAndTobago'])->name('international.trinidadAndTobago');

// Standalone pages
Route::get('/pages/about', function () {
    return view('about');
})->name('about');

Route::get('/pages/private-training', function () {
    return view('private-training');
})->name('privateTraining');

// Public website inquiry/contact forms.
Route::post('/contact', [ContactFormController::class, 'submit'])
    ->middleware('throttle:6,1')
    ->name('contact.submit');

// Keep the old Teamwear form action working while all current forms use
// route('contact.submit').
Route::post('/submit-form', [ContactFormController::class, 'submit'])
    ->middleware('throttle:6,1')
    ->name('contact.submit.legacy');

// Legacy local URL redirects
Route::redirect('/shop/mens-tops', '/pages/mens-tops', 301);
Route::redirect('/shop/mens-bottoms', '/pages/mens-bottoms', 301);
Route::redirect('/shop/womens-tops', '/pages/womens-top', 301);
Route::redirect('/shop/womens-bottoms', '/pages/womens-bottoms', 301);
Route::redirect('/shop/hats', '/pages/hats', 301);
Route::redirect('/shop/bags', '/pages/bags-encore', 301);

Route::redirect('/teamwear', '/pages/team-wear', 301);
Route::redirect('/teamwear/mensGameJerseys', '/pages/mens-game-jerseys', 301);
Route::redirect('/teamwear/mensShorts', '/pages/mens-shorts', 301);
Route::redirect('/teamwear/mensShooters', '/pages/mens-shooter-shirts', 301);
Route::redirect('/teamwear/mensReversibles', '/pages/mens-reversibles', 301);
Route::redirect('/teamwear/womensRacerbacks', '/pages/womens-game-jerseys', 301);
Route::redirect('/teamwear/womensShortsKilts', '/pages/womens-shorts-and-kilts', 301);
Route::redirect('/teamwear/womensShooters', '/pages/womens-shooter-shirts', 301);
Route::redirect('/teamwear/outerwear', '/pages/outerwear', 301);
Route::redirect('/teamwear/hoodies', '/pages/hoodies', 301);
Route::redirect('/teamwear/joggersSweats', '/pages/joggers-and-sweatpants', 301);
Route::redirect('/teamwear/lpp', '/pages/lpp', 301);

Route::redirect('/custom/team-stores', '/pages/team-store', 301);
Route::redirect('/custom/custom-graphic-design', '/pages/custom-graphic-design', 301);
Route::redirect('/custom/sizing-charts', '/pages/sizing', 301);
Route::redirect('/custom/fabric', '/pages/fabric', 301);
Route::redirect('/custom/embellishment', '/pages/embellishment', 301);

Route::redirect('/events/battle-of-the-bay', '/pages/battle-of-the-bay', 301);
Route::redirect('/events/impact10-showcase', '/pages/impact10-showcase', 301);
Route::redirect('/events/hawaii-youth-lacrosse-classic', '/pages/hawaii-youth-lacrosse-classic', 301);
Route::redirect('/events/las-vegas-lacrosse-showcase', '/pages/las-vegas-ls', 301);
Route::redirect('/events/kings-showcase', '/pages/kings-showcase', 301);
Route::redirect('/events/buffalo-wings-box-lacrosse', '/pages/box-lacrosse', 301);

Route::redirect('/international/sri-lanka', '/pages/sri-lanka', 301);
Route::redirect('/international/philippines', '/pages/philippines', 301);
Route::redirect('/international/ecuador', '/pages/ecuador', 301);
Route::redirect('/international/uganda', '/pages/uganda', 301);
Route::redirect('/international/japan', '/pages/japan', 301);
Route::redirect('/international/berlin', '/pages/berlin', 301);
Route::redirect('/international/colombia', '/pages/colombia', 301);
Route::redirect('/international/trinidad-and-tobago', '/pages/trinidad-tobago-lacrosse', 301);
Route::redirect('/about', '/pages/about', 301);
Route::redirect('/private-training', '/pages/private-training', 301);

// Dynamic storefront, cart, checkout and customer auth.
require __DIR__ . '/ecommerce.php';
