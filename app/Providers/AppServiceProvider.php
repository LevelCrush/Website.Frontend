<?php

namespace App\Providers;

use App\Listeners\AddDiscordMetadataLogin;
use Event;
use Illuminate\Auth\Events\Login;
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {
        //
    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
        Event::listen(Login::class, AddDiscordMetadataLogin::class);
    }
}
