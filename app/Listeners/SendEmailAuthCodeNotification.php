<?php

namespace App\Listeners;

use App\Events\UserLoggedInEvent;
use App\Notifications\EmailAuthCodeNotification;

class SendEmailAuthCodeNotification
{

    /**
     * Create the event listener.
     */
    public function __construct()
    {
    }

    /**
     * Handle the event.
     */
    public function handle(UserLoggedInEvent $event): void
    {
        $event->user->notify(new EmailAuthCodeNotification($event->emailAuthCode));
    }
}
