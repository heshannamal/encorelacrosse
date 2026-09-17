<?php

use App\Services\EncoreMirrorService;
use Illuminate\Foundation\Inspiring;
use Illuminate\Support\Facades\Artisan;

Artisan::command('inspire', function () {
    $this->comment(Inspiring::quote());
})->purpose('Display an inspiring quote');

Artisan::command('encore:mirror-sync {--fresh : Re-download cached pages and assets}', function () {
    /** @var EncoreMirrorService $mirror */
    $mirror = app(EncoreMirrorService::class);
    $fresh = (bool) $this->option('fresh');

    $this->info('Syncing Encore Lacrosse pages, CSS, JavaScript and web fonts...');

    $summary = $mirror->warmSite($fresh, function (string $url, int $pages, int $assets, int $failed): void {
        if ($pages <= 5 || $pages % 25 === 0) {
            $this->line("Pages: {$pages} | local assets: {$assets} | failed: {$failed} | {$url}");
        }
    });

    $this->newLine();
    $this->info("Mirror sync complete. Pages: {$summary['pages']}, local CSS/JS/fonts: {$summary['assets']}, failed: {$summary['failed']}.");
})->purpose('Download Encore pages plus storefront CSS, JavaScript and web fonts');

Artisan::command('encore:mirror-clear', function () {
    /** @var EncoreMirrorService $mirror */
    $mirror = app(EncoreMirrorService::class);
    $mirror->clearCache();
    $this->info('Encore local mirror cache cleared.');
})->purpose('Remove locally cached Encore storefront pages, CSS, JavaScript and fonts');
