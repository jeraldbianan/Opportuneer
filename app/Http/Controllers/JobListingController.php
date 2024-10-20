<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreJobListingRequest;
use App\Http\Requests\UpdateJobListingRequest;
use App\Models\JobListing;
use Illuminate\Http\Request;

class JobListingController extends Controller {
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request) {
        $jobs = JobListing::query();
        $keyword = trim($request->keyword);
        $location = trim($request->location);
        $min_salary = trim($request->min_salary);
        $max_salary = trim($request->max_salary);
        $experience = $request->experience;

        $jobs->when($keyword, function ($query) use ($keyword) {
            $query->where(function ($query) use ($keyword) {
                $query->where('title', 'like', '%' . $keyword . '%')
                    ->orWhere('description', 'like', '%' . $keyword . '%');
            });
        })->when($location, function ($query) use ($location) {
            $query->where('location', 'like', '%' . $location . '%');
        })->when($min_salary, function ($query) use ($min_salary) {
            $query->where('salary', '>=', $min_salary);
        })->when($max_salary, function ($query) use ($max_salary) {
            $query->where('salary', '<=', $max_salary);
        })->when($experience, function ($query) use ($experience) {
            $query->where('experience', $experience);
        });

        return view('job.index', ['jobs' => $jobs->get()]);
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
        return view('job.show', ['job' => $jobListing]);
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
