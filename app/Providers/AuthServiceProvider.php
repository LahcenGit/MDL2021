<?php

namespace App\Providers;

use Illuminate\Foundation\Support\Providers\AuthServiceProvider as ServiceProvider;
use Illuminate\Support\Facades\Gate;
use Illuminate\Support\Facades\Auth;

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
        Gate::resource('achat','App\Policies\AchatPolicy');
        Gate::resource('vendeur','App\Policies\VendeurPolicy');
        Gate::resource('agrement','App\Policies\AgrementPolicy');
        Gate::define('milkcheck.index',function(){
            return Auth::user()->type == 'milkcheck';
           });

        //
    }
}
