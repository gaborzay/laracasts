<?php

namespace App\Listeners;

use App\Events\UserRegistered;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Queue\InteractsWithQueue;

class AddUserToDefaultNewsLetterList
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
     * @param  UserRegistered  $event
     * @return void
     */
    public function handle(UserRegistered $event)
    {
        var_dump('use Campaign Monitor to add '.$event->event->email.' to the main newsletter list.');
//        $cm = new CampaignMonitor;
//        $cm->addToList('users');
    }
}
