<?php

namespace App\Providers;

use Illuminate\Auth\Notifications\ResetPassword;
use Illuminate\Foundation\Support\Providers\AuthServiceProvider as ServiceProvider;
use Illuminate\Notifications\Messages\MailMessage;
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

        Gate::define('milkcheck',function(){
            return Auth::user()->type == 'milkcheck';
           });

        Gate::define('admin',function(){
            return Auth::user()->type == 'admin';
           });
        Gate::define('particular',function(){
            return Auth::user()->type == 'particulier';
           });
        Gate::define('professional',function(){
            return Auth::user()->type == 'professionnel';
           });
        //
        ResetPassword::toMailUsing(function ($notifiable, $token) {
            $url = route('password.reset',$token).'?email='.$notifiable->getEmailForPasswordReset();
            return (new MailMessage())
                ->subject('MDL - Mot De Passe Oublié')
                ->view('vendor.notifications.reset-password', compact('url'));
        });
    }
}
