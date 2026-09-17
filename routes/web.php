<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ShopController;
use App\Http\Controllers\TeamwearController;
use App\Http\Controllers\CustomController;
use App\Http\Controllers\EventController;
use App\Http\Controllers\InternationalController;

Route::view('/', 'home.index')->name('home');

Route::prefix('shop')->name('shop.')->group(function () {
    Route::get('/mens-tops', [ShopController::class, 'mensTops'])->name('mens-tops');
    Route::get('/mens-bottoms', [ShopController::class, 'mensBottoms'])->name('mens-bottoms');
    Route::get('/womens-tops', [ShopController::class, 'womensTops'])->name('womens-tops');
    Route::get('/womens-bottoms', [ShopController::class, 'womensBottoms'])->name('womens-bottoms');
    Route::get('/hats', [ShopController::class, 'hats'])->name('hats');
    Route::get('/bags', [ShopController::class, 'bags'])->name('bags');
});

Route::prefix('teamwear')->name('teamwear.')->group(function () {
    Route::get('/', [TeamwearController::class, 'allTeamwear'])->name('allTeamwear');
    Route::get('/mensGameJerseys', [TeamwearController::class, 'mensGameJerseys'])->name('mensGameJerseys');
    Route::get('/mensShorts', [TeamwearController::class, 'mensShorts'])->name('mensShorts');
    Route::get('/mensShooters', [TeamwearController::class, 'mensShooters'])->name('mensShooters');
    Route::get('/mensReversibles', [TeamwearController::class, 'mensReversibles'])->name('mensReversibles');
    Route::get('/womensRacerbacks', [TeamwearController::class, 'womensRacerbacks'])->name('womensRacerbacks');
    Route::get('/womensShortsKilts', [TeamwearController::class, 'womensShortsKilts'])->name('womensShortsKilts');
    Route::get('/womensShooters', [TeamwearController::class, 'womensShooters'])->name('womensShooters');
    Route::get('/outerwear', [TeamwearController::class, 'outerwear'])->name('outerwear');
    Route::get('/hoodies', [TeamwearController::class, 'hoodies'])->name('hoodies');
    Route::get('/joggersSweats', [TeamwearController::class, 'joggersSweats'])->name('joggersSweats');
    Route::get('/lpp', [TeamwearController::class, 'lpp'])->name('lpp');
});

Route::prefix('custom')->name('custom.')->group(function () {
    Route::get('/team-stores', [CustomController::class, 'teamStores'])->name('teamStores');
    Route::get('/custom-graphic-design', [CustomController::class, 'customGraphicDesign'])->name('customGraphicDesign');
    Route::get('/sizing-charts', [CustomController::class, 'sizingCharts'])->name('sizingCharts');
    Route::get('/fabric', [CustomController::class, 'fabric'])->name('fabric');
    Route::get('/embellishment', [CustomController::class, 'embellishment'])->name('embellishment');
});

Route::prefix('events')->name('events.')->group(function () {
    Route::get('/battle-of-the-bay', [EventController::class, 'battleOfTheBay'])->name('battleOfTheBay');
    Route::get('/impact10-showcase', [EventController::class, 'impact10Showcase'])->name('impact10Showcase');
    Route::get('/hawaii-youth-lacrosse-classic', [EventController::class, 'hawaiiYouthLacrosseClassic'])->name('hawaiiYouthLacrosseClassic');
    Route::get('/las-vegas-lacrosse-showcase', [EventController::class, 'lasVegasLacrosseShowcase'])->name('lasVegasLacrosseShowcase');
    Route::get('/kings-showcase', [EventController::class, 'kingsShowcase'])->name('kingsShowcase');
    Route::get('/buffalo-wings-box-lacrosse', [EventController::class, 'buffaloWingsBoxLacrosse'])->name('buffaloWingsBoxLacrosse');
});

Route::prefix('international')->name('international.')->group(function () {
    Route::get('/sri-lanka', [InternationalController::class, 'sriLanka'])->name('sriLanka');
    Route::get('/philippines', [InternationalController::class, 'philippines'])->name('philippines');
    Route::get('/ecuador', [InternationalController::class, 'ecuador'])->name('ecuador');
    Route::get('/uganda', [InternationalController::class, 'uganda'])->name('uganda');
    Route::get('/japan', [InternationalController::class, 'japan'])->name('japan');
    Route::get('/berlin', [InternationalController::class, 'berlin'])->name('berlin');
    Route::get('/colombia', [InternationalController::class, 'colombia'])->name('colombia');
    Route::get('/trinidad-and-tobago', [InternationalController::class, 'trinidadAndTobago'])->name('trinidadAndTobago');
});

Route::get('/about', function () {
    return view('about');
})->name('about');

Route::get('/private-training', function () {
    return view('private-training');
})->name('privateTraining');
