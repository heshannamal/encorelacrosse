<?php

use App\Http\Controllers\CartController;
use App\Http\Controllers\CheckoutController;
use App\Http\Controllers\CustomerModuleSwitchController;
use App\Http\Controllers\EncoreAuthController;
use App\Http\Controllers\EncoreProfileController;
use App\Http\Controllers\StorefrontController;
use App\Http\Middleware\EnsureShopCustomerContext;
use Illuminate\Support\Facades\Route;

Route::get('/searched-products', function () {
    return redirect()->route('allProduct', request()->query());
})->name('search.results');

Route::get('/searched_products', function () {
    return redirect()->route('allProduct', request()->query());
})->name('search.results.legacy');

Route::prefix('collections')->group(function () {
    Route::get('/all-products', [StorefrontController::class, 'index'])->name('allProduct');
    Route::get('/product/{id}', [StorefrontController::class, 'show'])->whereNumber('id')->name('product');
    Route::get('/get-product/{id}', [StorefrontController::class, 'show'])->whereNumber('id')->name('getProduct');

    Route::get('/cart', [CartController::class, 'index'])->name('cart');
    Route::get('/cart/data', [CartController::class, 'data'])->name('cart.data');
    Route::get('/cart-count', [CartController::class, 'count'])->name('cart.count');
    Route::post('/cart/add', [CartController::class, 'add'])->name('cart.add');
    Route::put('/cart/{cartId}', [CartController::class, 'update'])->whereNumber('cartId')->name('cart.update');
    Route::delete('/cart/{cartId}', [CartController::class, 'remove'])->whereNumber('cartId')->name('cart.remove');
    Route::post('/cart/validate-checkout', [CartController::class, 'validateCheckout'])->name('cart.validate');

    Route::get('/checkout', [CheckoutController::class, 'index'])->name('checkout');
    Route::get('/checkout/payment-details', [CheckoutController::class, 'paymentDetails'])->name('checkout.payment');
    Route::post('/checkout/billing', [CheckoutController::class, 'saveBilling'])->name('checkout.billing');
    Route::post('/checkout/place-order', [CheckoutController::class, 'placeOrder'])->name('checkout.place');

    Route::post('/switch-to-shop', [CustomerModuleSwitchController::class, 'toShop'])->name('customer.module.switch.shop');
});

Route::prefix('pages')->group(function () {
    Route::get('/profile', [EncoreProfileController::class, 'show'])->name('profile');

    Route::middleware(EnsureShopCustomerContext::class)->group(function () {
        Route::get('/login', [EncoreAuthController::class, 'showLogin'])->name('login');
        Route::post('/login', [EncoreAuthController::class, 'login'])->name('login.post');
        Route::get('/register', [EncoreAuthController::class, 'showRegister'])->name('register');
        Route::post('/register', [EncoreAuthController::class, 'register'])->name('register.post');
        Route::get('/auth/google', [EncoreAuthController::class, 'redirectToGoogle'])->name('auth.google.redirect');
    });

    Route::get('/auth/google/callback', [EncoreAuthController::class, 'handleGoogleCallback'])->name('auth.google.callback');
    Route::post('/logout', [EncoreAuthController::class, 'logout'])->name('logout');
});
