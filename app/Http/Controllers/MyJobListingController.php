<?php

namespace App\Http\Controllers;

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
    public function store(Request $request) {
        $validatedData = $request->validate([
            'title' => 'required|string|max:255',
            'location' => 'required|string|max:255',
            'description' => 'required|string',
            'salary' => 'required|numeric|min:5000',
            'experience' => 'required|in:' . implode(',', JobListing::$experience),
            'category' => 'required|in:' . implode(',', JobListing::$category),
            'type' => 'required|in:' . implode(',', JobListing::$type),
            'tags' => 'required|string',
        ]);

        Auth::user()->employer->jobListings()->create($validatedData);

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
    public function edit(string $id) {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id) {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id) {
        //
    }
}
