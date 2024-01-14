<?php

use App\Http\Controllers\DashboardController;
use App\Http\Controllers\Projects\StoreController;
use Illuminate\Foundation\Application;
use Illuminate\Support\Facades\Route;
use Inertia\Inertia;

Route::get('/', function () {
    return Inertia::render('Welcome', [
        'canLogin' => Route::has('login'),
        'canRegister' => Route::has('register'),
        'laravelVersion' => Application::VERSION,
        'phpVersion' => PHP_VERSION,
    ]);
});

Route::middleware(['auth:sanctum', 'verified'])->group( function() {
    Route::get('dashboard', DashboardController::class)->name('dashboard');

    Route::prefix('projects')->as('app:projects:')->group( function() {
        Route::post('/', StoreController::class)->name('store');
    });
});
