<?php

use App\Services\EncoreMirrorService;
use Illuminate\Foundation\Inspiring;
use Illuminate\Support\Facades\Artisan;

Artisan::command('inspire', function () {
    $this->comment(Inspiring::quote());
})->purpose('Display an inspiring quote');

Artisan::command('encore:mirror-sync {--fresh : Re-download cached pages, CSS and JavaScript}', function () {
    /** @var EncoreMirrorService $mirror */
    $mirror = app(EncoreMirrorService::class);
    $fresh = (bool) $this->option('fresh');

    $this->info('Syncing Encore Lacrosse pages plus CSS and JavaScript only...');

    $summary = $mirror->warmSite($fresh, function (string $url, int $pages, int $assets, int $failed): void {
        if ($pages <= 5 || $pages % 25 === 0) {
            $this->line("Pages: {$pages} | CSS/JS: {$assets} | failed: {$failed} | {$url}");
        }
    });

    $this->newLine();
    $this->info("Mirror sync complete. Pages: {$summary['pages']}, CSS/JS: {$summary['assets']}, failed: {$summary['failed']}.");
})->purpose('Download Encore storefront CSS and JavaScript into local project storage');

Artisan::command('encore:mirror-clear', function () {
    /** @var EncoreMirrorService $mirror */
    $mirror = app(EncoreMirrorService::class);
    $mirror->clearCache();
    $this->info('Encore local page/CSS/JS cache cleared.');
})->purpose('Remove locally cached Encore pages, CSS and JavaScript');
