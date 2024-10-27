<?php

namespace App\Http\Controllers;

use App\Models\JobListing;
use Illuminate\Support\Facades\Gate;

class JobListingController extends Controller {
    /**
     * Display a listing of the resource.
     */
    public function index() {
        Gate::authorize('viewAny', JobListing::class);

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

        $hasFilters = array_filter($filters);

        if ($hasFilters && !request()->has('page')) {
            return redirect()->route('job-listings.index', array_merge($filters, ['page' => 1]));
        }

        $jobs = JobListing::filter($filters)->latest()->paginate(10)->withQueryString();

        return view('job.index', ['jobs' => $jobs]);
    }

    /**
     * Display the specified resource.
     */
    public function show(JobListing $jobListing) {
        Gate::authorize('view', $jobListing);

        $jobListings = $jobListing->employer->jobListings()->latest()->paginate(10);

        return view('job.show', [
            'job' => $jobListing,
            'jobListings' => $jobListings
        ]);
    }
}
