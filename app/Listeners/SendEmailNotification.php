<?php

namespace App\Listeners;

use App\Events\MaintenanceNotification;
use App\Mail\MaintenanceNotificationMail;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Support\Facades\Mail;
use App\Models\User;


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

        $admin = User::first();
        Mail::to($admin->email)->send(new MaintenanceNotificationMail($event->machine));
    
    }
}
