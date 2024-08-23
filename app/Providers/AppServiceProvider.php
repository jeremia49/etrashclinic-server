<?php

namespace App\Providers;

use App\Listeners\RefundSubscriber;
use App\Listeners\SampahEventSubscriber;
use Illuminate\Support\Facades\Event;
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {
        //
    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
        Event::subscribe(SampahEventSubscriber::class);
        Event::subscribe(RefundSubscriber::class);
    }
}
