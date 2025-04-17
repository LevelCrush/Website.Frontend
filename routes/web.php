<?php

use App\Http\Controllers\PageController;
use Illuminate\Support\Facades\Route;
use Livewire\Volt\Volt;

Route::get('/', [\App\Http\Controllers\PageController::class, 'index'])->name('home');

// authentication routes
Route::get('/auth/levelcrush',[\App\Http\Controllers\LevelCrushAuthController::class, 'auth']);
Route::get('/auth/levelcrush/validate',[\App\Http\Controllers\LevelCrushAuthController::class, 'validate']);

// game routes
Route::get('/game/all/clan', [\App\Http\Controllers\ClanController::class, 'showNetwork'])->name('clan.overview');
Route::get('/game/{game}/clan/network', [\App\Http\Controllers\ClanController::class, 'showNetwork'])->name('clan.overview.network');
Route::get('/game/{game}/clan/{slug}', [\App\Http\Controllers\ClanController::class, 'showSpecific'])->name('clan.overview.specific');

// member dashboard routes
Route::view('dashboard', 'dashboard')
    ->middleware(['auth', 'verified'])
    ->name('dashboard');

Route::middleware(['auth'])->group(function () {
    Route::redirect('settings', 'settings/profile');

    Volt::route('settings/profile', 'settings.profile')->name('settings.profile');
    Volt::route('settings/password', 'settings.password')->name('settings.password');
    Volt::route('settings/appearance', 'settings.appearance')->name('settings.appearance');
});

// fallback routes



require __DIR__.'/auth.php';
