<?php

use App\Http\Controllers\Admin\AdminAuthController;
use App\Http\Controllers\Admin\AmenityController;
use App\Http\Controllers\Admin\CategoryController;
use App\Http\Controllers\Admin\DashboardController;
use App\Http\Controllers\Admin\ListingController;
use App\Http\Controllers\Admin\ListingImageGalleryController;
use App\Http\Controllers\Admin\ListingVideoGalleryController;
use App\Http\Controllers\Admin\LocationController;
use App\Http\Controllers\Admin\ProfileController as AdminProfileController;
use App\Http\Controllers\Admin\HeroController;
use Illuminate\Support\Facades\Route;

Route::get('admin/login', [AdminAuthController::class, 'login'])->name('admin.login');
Route::get('admin/password/forgot', [AdminAuthController::class, 'forgotPassword'])->name('admin.password.request');

Route::group(['middleware' => ['auth', 'user.type:admin'], 'prefix' => 'admin', 'as' => 'admin.'], function () {
    Route::get('dashboard', [DashboardController::class, 'index'])->name('dashboard');
    Route::post('logout', [AdminAuthController::class, 'logout'])->name('logout');

    /* Profile */
    Route::get('profile', [AdminProfileController::class, 'index'])->name('profile');
    Route::put('profile', [AdminProfileController::class, 'update'])->name('profile.update');
    Route::put('profile/password', [AdminProfileController::class, 'updatePassword'])->name('profile.password.update');

    /* Hero */
    Route::get('hero', [HeroController::class, 'index'])->name('hero');
    Route::put('hero', [HeroController::class, 'updateHeroSection'])->name('hero.update');
    /* Category */
    Route::resource('category', CategoryController::class)->except(['show']);
    /* Location */
    Route::resource('location', LocationController::class)->except(['show']);
    /* Amenity */
    Route::resource('amenity', AmenityController::class)->except(['show']);
    /* Listing */
    Route::resource('listing', ListingController::class);
    /* Listing Image Gallery */
    Route::resource('listing-gallery', ListingImageGalleryController::class);
    /* Listing Video Gallery */
    Route::resource('listing-video-gallery', ListingVideoGalleryController::class);
});