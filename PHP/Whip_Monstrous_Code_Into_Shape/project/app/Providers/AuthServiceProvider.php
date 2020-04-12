<?php

namespace App\Providers;

use Illuminate\Foundation\Support\Providers\AuthServiceProvider as ServiceProvider;
use Illuminate\Support\Facades\Gate;

class AuthServiceProvider extends ServiceProvider
{
    /**
     * The policy mappings for the application.
     *
     * @var array
     */
    protected $policies = [
        'App\Team' => 'App\Policies\TeamMemberPolicy',
    ];

    /**
     * Register any authentication / authorization services.
     *
     * @param  Gate  $gate
     * @return void
     */
    public function boot(Gate $gate)
    {
        $this->registerPolicies();

//        $gate->before(function ($user) {
//            if ($user->isAdmin()) {
//                return true;
//            }
//        });
    }
}
