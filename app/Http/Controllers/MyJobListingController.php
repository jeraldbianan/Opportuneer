<?php

namespace App\Http\Controllers;

use App\Http\Requests\JobListingRequest;
use App\Models\JobListing;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Gate;

class MyJobListingController extends Controller {
    /**
     * Display a listing of the resource.
     */
    public function index() {
        Gate::authorize('viewAnyEmployer', JobListing::class);

        $jobListings = Auth::user()->employer
            ->jobListings()
            ->with('jobListingApplications')
            ->withTrashed()
            ->latest()
            ->paginate(5);

        return view('my_job.index', ['jobs' => $jobListings]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create() {
        Gate::authorize('create', JobListing::class);

        return view('my_job.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(JobListingRequest $request) {
        Gate::authorize('create', JobListing::class);

        Auth::user()->employer->jobListings()->create($request->validated());

        return redirect()->route('my-job-listings.index')->with('success', 'Job created successfully');
    }

    /**
     * Display the specified resource.
     */
    public function show(JobListing $myJobListing) {
        Gate::authorize('viewEmployer', $myJobListing, JobListing::class);

        $applications = $myJobListing->jobListingApplications()->paginate(5);
        return view('my_job.show', ['job' => $myJobListing, 'applications' => $applications]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(JobListing $myJobListing) {
        Gate::authorize('update', $myJobListing, JobListing::class);
        return view('my_job.edit', ['job' => $myJobListing]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(JobListingRequest $request, JobListing $myJobListing) {
        Gate::authorize('update', $myJobListing, JobListing::class);

        $myJobListing->update($request->validated());

        return redirect()->route('my-job-listings.index')->with('success', 'Job Updated Successfully');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(JobListing $myJobListing) {
        Gate::authorize('delete', $myJobListing, JobListing::class);
        $myJobListing->delete();

        return redirect()->route('my-job-listings.index')
            ->with('success', 'Job deleted.');
    }
}
