<?php

namespace App\Listeners;

use App\Events\SendWelcomeMessageEvent;
use App\Mail\WelcomeNewUserMail;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Support\Facades\Mail;
class SendWelcomeMessageListener
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
     * @param  \App\Events\SendWelcomeMessageEvent  $event
     * @return void
     */
    public function handle(SendWelcomeMessageEvent $event)
    {
        Mail::to($event->user['email'])->send(new WelcomeNewUserMail() );
    }
}
