<?php

use App\Console\Commands\CloseExpiredEvents;
use App\Console\Commands\NotifySubscribersAboutEvents;
use App\Jobs\NotifyEventJob;
use Illuminate\Foundation\Inspiring;
use Illuminate\Support\Facades\Artisan;

use Illuminate\Support\Facades\Schedule;

Artisan::command('inspire', function () {
    $this->comment(Inspiring::quote());
})->purpose('Display an inspiring quote');

Schedule::job(new NotifySubscribersAboutEvents)
    ->everyMinute()
    ->withoutOverlapping()
    ->onOneServer();

Schedule::job(new CloseExpiredEvents)
    ->everyMinute()
    ->withoutOverlapping()
    ->onOneServer();
