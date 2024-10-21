<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreJobListingRequest;
use App\Http\Requests\UpdateJobListingRequest;
use App\Models\JobListing;

class JobListingController extends Controller {
    /**
     * Display a listing of the resource.
     */
    public function index() {
        $filters = request()->only(
            'keyword',
            'location',
            'min_salary',
            'max_salary',
            'experience',
            'category',
            'type',
            'tag'
        );

        $jobs = JobListing::filter($filters)->latest()->paginate(10);

        return view('job.index', ['jobs' => $jobs]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create() {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreJobListingRequest $request) {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(JobListing $jobListing) {
        return view('job.show', ['job' => $jobListing->load('employer.jobListings')]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(JobListing $jobListing) {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateJobListingRequest $request, JobListing $jobListing) {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(JobListing $jobListing) {
        //
    }
}
