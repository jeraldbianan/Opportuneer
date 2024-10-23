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
        $jobListing->jobApplications()->create([
            'user_id' => $request->user()->id,
            ...$request->validate([
                'expected_salary' => 'required|min:1|max:1000000'
            ])
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
