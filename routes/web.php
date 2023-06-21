<?php

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\LandingController;
use App\Http\Controllers\CartController;
use App\Http\Controllers\HomeController;


Route::get('/', [LandingController::class, 'index'])->name('index');

Route::middleware(['auth', 'web'])->group(function () {
    // General
    Route::get('/dashboard', [HomeController::class, 'index'])->name('dashboard');

    Route::get('cart', [CartController::class, 'index'])->name('cart');
    Route::resource('carts', CartController::class);

    Route::prefix('profile')->name('profile.')->group(function () {
        Route::get('/', [ProfileController::class, 'edit'])->name('edit');
        Route::patch('/', [ProfileController::class, 'update'])->name('update');
        Route::delete('/', [ProfileController::class, 'destroy'])->name('destroy');
    });
});

require __DIR__ . '/auth.php';
