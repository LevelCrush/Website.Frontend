<?php

use Illuminate\Support\Facades\Route;
use Livewire\Volt\Volt;

Route::get('/', function () {
    return view('welcome');
})->name('home');

Route::get('/game/all/clan', [\App\Http\Controllers\ClanController::class, 'showNetwork'])->name('clan.overview');
Route::get('/game/{game}/clan/network', [\App\Http\Controllers\ClanController::class, 'showNetwork'])->name('clan.overview.network');
Route::get('/game/{game}/clan/{slug}', [\App\Http\Controllers\ClanController::class, 'showSpecific'])->name('clan.overview.specific');

Route::get('/tools/destiny', [\App\Http\Controllers\ToolController::class, 'showDestiny'])->name('tools.destiny');

Route::view('dashboard', 'dashboard')
    ->middleware(['auth', 'verified'])
    ->name('dashboard');

Route::middleware(['auth'])->group(function () {
    Route::redirect('settings', 'settings/profile');

    Volt::route('settings/profile', 'settings.profile')->name('settings.profile');
    Volt::route('settings/password', 'settings.password')->name('settings.password');
    Volt::route('settings/appearance', 'settings.appearance')->name('settings.appearance');
});

require __DIR__.'/auth.php';
