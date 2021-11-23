<?php

namespace App\Listeners\Auth;

use App\Jobs\Auth\FeedbackRequestJob;
use App\Mail\WelcomeMail;
use Illuminate\Auth\Events\Registered;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Support\Facades\Mail;

class RegisteredListener implements ShouldQueue
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
     * @param  object  $event
     * @return void
     */
    public function handle(Registered $event)
    {
        Mail::to($event->user)->send(new WelcomeMail());
    }
}
