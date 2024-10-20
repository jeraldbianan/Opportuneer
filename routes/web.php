<?php

use App\Http\Controllers\JobListingController;
use Illuminate\Support\Facades\Route;

Route::get('', fn() => to_route('job-listings.index'));

Route::resource('job-listings', JobListingController::class);
