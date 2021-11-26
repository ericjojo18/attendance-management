<?php

namespace App\Providers;

use App\Models\User;
use Illuminate\Support\Facades\Gate;
use Illuminate\Foundation\Support\Providers\AuthServiceProvider as ServiceProvider;

class AuthServiceProvider extends ServiceProvider
{
    /**
     * The policy mappings for the application.
     *
     * @var array
     */
    protected $policies = [
        // 'App\Models\Model' => 'App\Policies\ModelPolicy',
    ];

    /**
     * Register any authentication / authorization services.
     *
     * @return void
     */
    public function boot()
    {
        $this->registerPolicies();
        Gate::after(function (User $user) {
            return $user->hasRole('super-admin'); 
         });
        Gate::define("admin",function (User $user){
            return $user->hasRole('admin');
        });
        Gate::define("formateur",function (User $user){
            return $user->hasRole('formateur');
        });
        Gate::define("apprenant",function (User $user){
            return $user->hasRole('apprenant');
        });
       
    }
}
