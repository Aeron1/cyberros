<?php

namespace App\Providers;

use Illuminate\Contracts\Auth\Access\Gate as AccessGate;
use Illuminate\Foundation\Support\Providers\AuthServiceProvider as ServiceProvider;
use Illuminate\Support\Facades\Gate;

class AuthServiceProvider extends ServiceProvider
{
    /**
     * The model to policy mappings for the application.
     *
     * @var array<class-string, class-string>
     */
    protected $policies = [
        // 'App\Models\Model' => 'App\Policies\ModelPolicy',
    ];

    /**
     * Register any authentication / authorization services.
     *
     * @return void
     */
    public function boot(AccessGate $gate)
    {
        $this->registerPolicies();

        $gate->define('isadmin', function($user){
            return $user->role == 'admin';
        });
        
         $gate->define('isuser', function($user){
            return $user->role == 'user';
        });
    }
}
