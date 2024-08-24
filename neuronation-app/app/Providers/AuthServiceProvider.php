<?php

namespace App\Providers;

use App\Models\User;
use Illuminate\Foundation\Support\Providers\AuthServiceProvider as ServiceProvider;

class AuthServiceProvider extends ServiceProvider
{
    /**
     * The model to policy mappings for the application.
     *
     * @var array<class-string, class-string>
     */
    protected $policies = [
        //
    ];

    /**
     * Register any authentication / authorization services.
     */
    public function boot(): void
    {
       if ($this->app->environment('local')) {
            $user = User::where('email', 'neuronation@test.com')->first();
            if ($user) {
                $this->app['auth']->setUser($user);
            }
        }
    }
}
