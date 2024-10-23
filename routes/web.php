<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\JobListingApplicationController;
use App\Http\Controllers\JobListingController;
use Illuminate\Support\Facades\Route;

Route::get('/', [HomeController::class, 'index'])->name('home');

Route::resource('job-listings', JobListingController::class)->only(['index', 'show']);

Route::get('login', fn() => to_route('auth.create'))->name('login');
Route::resource('auth', AuthController::class)->only(['create', 'store']);

Route::delete('auth', [AuthController::class, 'destroy'])->name('auth.destroy');
Route::get('logout', fn() => to_route('auth.destroy'))->name('logout');

Route::middleware('auth')->group(function () {
    Route::resource('job-listings.application', JobListingApplicationController::class)->only(['create', 'store']);
});
