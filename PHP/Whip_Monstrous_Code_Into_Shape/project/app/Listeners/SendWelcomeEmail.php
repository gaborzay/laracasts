<?php

namespace App\Listeners;

use App\Events\UserRegistered;
use Illuminate\Contracts\Mail\Mailer;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Support\Facades\Mail;

class SendWelcomeEmail
{
    /**
     * @var Mailer
     */
    private Mailer $mailer;

    /**
     * Create the event listener.
     *
     * @param  Mailer  $mailer
     */
    public function __construct(Mailer $mailer)
    {
        //
        $this->mailer = $mailer;
    }

    /**
     * Handle the event.
     *
     * @param  UserRegistered  $event
     * @return void
     */
    public function handle(UserRegistered $event)
    {
        var_dump('sending a welcome email to '.$event->user->email);
//        Mail::send('emails.welcome', compact('user'), function ($message) use ($user) {
//            $message->to($user->email)->subject('Welcome to Laracasts');
//        });
    }
}
