<?php

namespace App\Http\Controllers;

use App\Models\JobListing;
use Illuminate\Http\Request;

class HomeController extends Controller {
    /**
     * Display a listing of the resource.
     */
    public function index() {
        $jobs = JobListing::latest()->get();

        return view('home', ['jobs' => $jobs]);
    }
}
