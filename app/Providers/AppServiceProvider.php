<?php

namespace App\Providers;

use App\Listeners\AddDiscordMetadataLogin;
use Event;
use Guava\FilamentKnowledgeBase\Filament\Panels\KnowledgeBasePanel;
use Illuminate\Auth\Events\Login;
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {
        KnowledgeBasePanel::configureUsing(
            fn(KnowledgeBasePanel $panel) => $panel
                ->viteTheme('resources/css/filament/admin/theme.css') // your filament vite theme path here
        );
    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
        Event::listen(Login::class, AddDiscordMetadataLogin::class);


    }
}
