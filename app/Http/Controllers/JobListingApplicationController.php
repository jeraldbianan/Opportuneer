<?php

namespace App\Http\Controllers;

use App\Models\JobListing;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Http\Request;

class JobListingApplicationController extends Controller {
    use AuthorizesRequests;

    /**
     * Show the form for creating a new resource.
     */
    public function create(JobListing $jobListing) {
        $this->authorize('apply', $jobListing);

        return view('job_application.create', ['job' => $jobListing]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(JobListing $jobListing, Request $request) {
        $this->authorize('apply', $jobListing);

        $validatedData = $request->validate([
            'expected_salary' => 'required|min:1|max:1000000',
            'cv' => 'required|file|mimes:pdf|max:2048'
        ]);

        $file = $request->file('cv');
        $path = $file->store('cvs', 'private');

        $jobListing->jobListingApplications()->create([
            'user_id' => $request->user()->id,
            'expected_salary' => $validatedData['expected_salary'],
            'cv_path' => $path
        ]);

        return redirect()->route('job-listings.show', $jobListing)->with('success', 'Job Application Submitted.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id) {
        //
    }
}
