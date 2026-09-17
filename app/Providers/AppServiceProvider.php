<?php

namespace App\Providers;

use App\Services\EncoreCssJsMirrorService;
use App\Services\EncoreMirrorService;
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    public function register(): void
    {
        // Keep the live storefront images/video, while the production CSS,
        // JavaScript and web fonts are downloaded and served by Laravel.
        $this->app->singleton(EncoreMirrorService::class, function ($app): EncoreMirrorService {
            return $app->make(EncoreCssJsMirrorService::class);
        });
    }

    public function boot(): void
    {
        //
    }
}
