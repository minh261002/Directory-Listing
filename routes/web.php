<?php

use App\Http\Controllers\Frontend\AgentListingController;
use App\Http\Controllers\Frontend\FrontendController;
use App\Http\Controllers\Frontend\ProfileController as FrontendProfileController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Frontend\DashboardController as FrontendDashboardController;

Route::get('/', [FrontendController::class, 'index'])->name('home');


Route::middleware('auth')->group(function () {
    Route::get('/dashboard', [FrontendDashboardController::class, 'index'])->name('dashboard');
    Route::get('profile', [FrontendProfileController::class, 'index'])->name('profile');
    Route::put('profile', [FrontendProfileController::class, 'update'])->name('profile.update');
    Route::put('profile/password', [FrontendProfileController::class, 'updatePassword'])->name('profile.password');

    /* Listing */
    Route::resource('listing', AgentListingController::class);
});

require __DIR__ . '/auth.php';