<?php

namespace App\Http\Controllers;

use App\Models\JobListingApplication;
use App\Policies\JobListingApplicationPolicy;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Gate;

class MyJobListingApplicationController extends Controller {
    /**
     * Display a listing of the resource.
     */
    public function index() {
        return view('my_job_application.index', [
            'applications' => Auth::user()->jobListingApplications()
                ->with([
                    'jobListing' => fn($query) => $query->withCount('jobListingApplications')
                        ->withAvg('jobListingApplications', 'expected_salary')
                        ->withTrashed(),
                    'jobListing.employer'
                ])
                ->latest()->paginate(5),
        ]);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(JobListingApplication $myJobListingsApplication) {
        Gate::authorize('delete', $myJobListingsApplication, JobListingApplication::class);

        $myJobListingsApplication->delete();

        return redirect()->back()->with('success', 'Job Application Cancelled.');
    }
}
