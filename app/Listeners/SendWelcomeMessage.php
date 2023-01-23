<?php

namespace App\Listeners;

use App\Events\WelcomeUserEvent;
use App\Mail\WelcomeNewUserMail;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Support\Facades\Mail;

class SendWelcomeMessage
{
    /**
     * Create the event listener.
     *
     * @return void
     */
    public function __construct()
    {
        //
    }

    /**
     * Handle the event.
     *
     * @param  \App\Events\WelcomeUserEvent  $event
     * @return void
     */
    public function handle(WelcomeUserEvent $event)
    {
        Mail::to($event->user['email'])->send(new WelcomeNewUserMail());
    }
}
