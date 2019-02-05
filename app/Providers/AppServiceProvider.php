<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use App\Meme;
use App\User;
use App\Observers\MemeObserver;
use App\Observers\UserObserver;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        Meme::observe(MemeObserver::class);
        User::observe(UserObserver::class);
    }

    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        //
    }
}
