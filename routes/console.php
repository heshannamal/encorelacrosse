<?php

use Illuminate\Foundation\Inspiring;
use Illuminate\Support\Facades\Artisan;
use Illuminate\Support\Facades\Schedule;

Artisan::command('inspire', function () {
    $this->comment(Inspiring::quote());
})->purpose('Display an inspiring quote');


/*
|--------------------------------------------------------------------------
| Scheduled Tasks
|--------------------------------------------------------------------------
|
| Laravel 12 does not require app/Console/Kernel.php. Application schedules
| can be registered here. The command itself only refreshes the Instagram
| token when needed, so it is safe to check once every day.
|
*/
Schedule::command('instagram:refresh-token')
    ->dailyAt('03:15')
    ->withoutOverlapping();
