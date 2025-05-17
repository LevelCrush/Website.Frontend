<?php

use App\Http\Controllers\PageController;
use Illuminate\Support\Facades\Route;
use Livewire\Volt\Volt;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\ClanController;
use App\Http\Controllers\LevelCrushAuthController;

// basic page routes
Route::controller(PageController::class)->group(function () {
    Route::get('/', 'index')->name('home');
    Route::get('/logout', 'logout')->name('logout-get');
});

// authentication routes
Route::controller(LevelCrushAuthController::class)->group(function () {
    Route::get('/auth/levelcrush', 'auth')->name('levelcrush-auth');
    Route::get('/auth/levelcrush/validate', 'validate')->name('levelcrush-auth-validate');
});

// game routes
Route::controller(ClanController::class)->group(function () {
    Route::get('/game/all/clan', 'showNetwork')->name('clan.overview');
    Route::get('/game/{game}/clan/network', 'showNetwork')->name('clan.overview.network');
    Route::get('/game/{game}/clan/{slug}', 'showSpecific')->name('clan.overview.specific');
});

Route::middleware(['auth'])->controller(DashboardController::class)->group(function () {
    Route::get('/dashboard', 'index')->name('dashboard');
    Route::get('/dashboard/orders', 'orders')->name('dashboard.orders');
    Route::get('/dashboard/integrations', 'integrations')->name('dashboard.integrations');
});

// fallback routes



require __DIR__ . '/auth.php';
