<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\EmployerController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\JobListingApplicationController;
use App\Http\Controllers\JobListingController;
use App\Http\Controllers\MyJobListingApplicationController;
use App\Http\Controllers\MyJobListingController;
use Illuminate\Support\Facades\Route;

Route::get('/', [HomeController::class, 'index'])->name('home');

Route::resource('job-listings', JobListingController::class)->only(['index', 'show']);

Route::middleware('guest')->group(function () {
    Route::get('login', fn() => to_route('auth.create'))->name('login');
    Route::resource('auth', AuthController::class)->only(['create', 'store']);
});

Route::delete('auth', [AuthController::class, 'destroy'])->name('auth.destroy');
Route::get('logout', fn() => to_route('auth.destroy'))->name('logout');

Route::middleware('auth')->group(function () {
    Route::resource('job-listings.application', JobListingApplicationController::class)->only(['create', 'store']);
    Route::resource('my-job-listings-application', MyJobListingApplicationController::class)->only(['index', 'destroy']);
    Route::resource('employer', EmployerController::class)->only(['create', 'store']);
    Route::middleware('employer')->resource('my-job-listings', MyJobListingController::class);
});
