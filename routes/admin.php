<?php

use App\Http\Controllers\Admin\DashboardController;
use App\Http\Controllers\Admin\ProfileController;
use App\Http\Controllers\Admin\DispatcherController;
use App\Http\Controllers\Admin\TruckController;
use App\Http\Controllers\Admin\AccessoriesController;
use App\Http\Controllers\Admin\LoadController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Admin\AuthenticatedController;
use App\Http\Controllers\Admin\LoadMatchController;


Route::group(["prefix"=> "admin"], function () {
   Route::get('/login', [AuthenticatedController::class, 'index'])->name('login');

});
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
    Route::get('load-matches', [LoadMatchController::class, 'index'])->name('load-matches.index');
    Route::patch('load-matches/{match}/status', [LoadMatchController::class, 'updateStatus'])->name('load_matches.update_status');
    Route::delete('load-matches/{match}', [LoadMatchController::class, 'destroy'])->name('load_matches.destroy');

    });
