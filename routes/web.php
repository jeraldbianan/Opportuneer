<?php

use App\Http\Controllers\JobListingController;
use Illuminate\Support\Facades\Route;


Route::resource('job-listings', JobListingController::class);
