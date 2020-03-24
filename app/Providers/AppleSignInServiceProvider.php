<?php

namespace App\Providers;

use Illuminate\Support\Facades\Blade;
use Illuminate\Support\ServiceProvider;
use Laravel\Socialite\Contracts\Factory;

class AppleSignInServiceProvider extends ServiceProvider
{
    protected $defer = false;

    public function boot()
    {
        $this->bootSocialiteDriver();
    }

    public function bootSocialiteDriver()
    {
        $socialite = $this->app->make(Factory::class);
        $socialite->extend(
            'sign-in-with-apple',
            function ($app) use ($socialite) {
                $config = $app['config']['services.sign_in_with_apple'];

                return $socialite
                    ->buildProvider(SignInWithAppleProvider::class, $config);
            }
        );
    }
}