<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use App\Meme;
use App\Observers\MemeObserver;

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
