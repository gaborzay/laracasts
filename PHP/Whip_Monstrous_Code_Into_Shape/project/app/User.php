<?php

namespace App;

use App\Events\UserRegistered;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class User extends Authenticatable
{
    use Notifiable, Completable, ParticipatesInForum;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'email', 'password',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    public static function register(array $attributes)
    {
        $user = static::create($attributes);

        event(new UserRegistered($user));

        return $user;
    }

    /**
     * @return Stats
     */
    public function stats()
    {
        return new Stats($this);
    }

    /**
     * @return bool
     */
    public function isAdmin(){
        return $this->id == 1;
    }
}
