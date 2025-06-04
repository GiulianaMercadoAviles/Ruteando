<?php

namespace App\Providers;

use App\Events\MaintenanceNotification;
use App\Listeners\SendEmailNotification;
use Illuminate\Support\ServiceProvider;

class EventServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    protected $listen = [
        MaintenanceNotification::class => [
            SendEmailNotification::class,
        ],
    ];

    public function register(): void
    {
        //
    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
        //
    }
}
