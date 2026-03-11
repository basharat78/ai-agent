<?php

use App\Http\Controllers\Admin\DashboardController;
use App\Http\Controllers\Admin\ProfileController;
use App\Http\Controllers\Admin\DispatcherController;
use App\Http\Controllers\Admin\TruckController;
use App\Http\Controllers\Admin\AccessoriesController;
use App\Http\Controllers\Admin\LoadController;
use Illuminate\Support\Facades\Route;

Route::group(['as' => 'admin.', 'prefix' => 'admin', 'middleware' => ['auth']], function () {
    Route::get('dashboard', [DashboardController::class, 'index'])->name('dashboard.index');
    
    // Profile
    Route::get('profile', [ProfileController::class, 'index'])->name('profile');
    Route::post('profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::post('profile/password', [ProfileController::class, 'PasswordUpdate'])->name('profile.password.update');

    Route::resource('dispatchers', DispatcherController::class);
    Route::resource('trucks',TruckController::class);
    Route::resource('accessories', AccessoriesController::class);
    Route::resource('loads', LoadController::class);
    });
