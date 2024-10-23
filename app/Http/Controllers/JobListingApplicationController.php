<?php

namespace App\Http\Controllers;

use App\Models\JobListing;
use Illuminate\Http\Request;

class JobListingApplicationController extends Controller {
    /**
     * Show the form for creating a new resource.
     */
    public function create(JobListing $jobListing) {
        return view('job_application.create', ['job' => $jobListing]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request) {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id) {
        //
    }
}
