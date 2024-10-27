<?php

namespace App\Http\Controllers;

use App\Http\Requests\JobListingRequest;
use App\Models\JobListing;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class MyJobListingController extends Controller {
    /**
     * Display a listing of the resource.
     */
    public function index() {
        $jobListings = Auth::user()->employer
            ->jobListings()
            ->with('jobListingApplications')
            ->latest()
            ->paginate(5);

        return view('my_job.index', ['jobs' => $jobListings]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create() {
        return view('my_job.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(JobListingRequest $request) {
        Auth::user()->employer->jobListings()->create($request->validated());

        return redirect()->route('my-job-listings.index')->with('success', 'Job created successfully');
    }

    /**
     * Display the specified resource.
     */
    public function show(JobListing $myJobListing) {
        $applications = $myJobListing->jobListingApplications()->paginate(5);
        return view('my_job.show', ['job' => $myJobListing, 'applications' => $applications]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(JobListing $myJobListing) {
        return view('my_job.edit', ['job' => $myJobListing]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(JobListingRequest $request, JobListing $myJobListing) {
        $myJobListing->update($request->validated());

        return redirect()->route('my-job-listings.index')->with('success', 'Job Updated Successfully');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id) {
        //
    }
}
