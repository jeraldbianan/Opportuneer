<?php

use App\Http\Controllers\HomeController;
use App\Http\Controllers\JobListingController;
use Illuminate\Support\Facades\Route;

Route::get('/', [HomeController::class, 'index'])->name('home');

Route::resource('job-listings', JobListingController::class)->only('index', 'show');
