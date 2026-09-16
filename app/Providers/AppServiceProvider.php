<?php

namespace App\Providers;

use App\Services\EncoreCssJsMirrorService;
use App\Services\EncoreMirrorService;
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {
        // The storefront keeps the live images/video/fonts, while only the
        // production CSS and JavaScript are downloaded and served locally.
        $this->app->singleton(EncoreMirrorService::class, function ($app): EncoreMirrorService {
            return $app->make(EncoreCssJsMirrorService::class);
        });
    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
        //
    }
}
