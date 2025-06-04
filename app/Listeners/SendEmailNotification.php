<?php

namespace App\Listeners;

use App\Events\MaintenanceNotification;
use App\Mail\MaintenanceNotificationMail;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Support\Facades\Mail;

class SendEmailNotification
{
    /**
     * Create the event listener.
     */
    public function __construct()
    {
        //
    }

    /**
     * Handle the event.
     */
    public function handle(MaintenanceNotification $event): void
    {
        Mail::to('giulianamercado43@gmail.com')->send(new MaintenanceNotificationMail($event->machine));
    
    }
}
