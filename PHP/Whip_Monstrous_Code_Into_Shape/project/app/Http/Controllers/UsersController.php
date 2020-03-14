<?php

namespace App\Http\Controllers;

use App\User;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;

class UsersController extends Controller
{
    public function store()
    {
        /*
         * Register a user.
         *
         * @event App\Events\UserRegistered
         */
        User::register([
            'name' => 'Gabor',
            'email' => 'gabor@test.com',
            'password' => bcrypt('password')
        ]);
    }
}
