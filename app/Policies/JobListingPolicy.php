<?php

namespace App\Policies;

use App\Models\JobListing;
use App\Models\User;
use Illuminate\Auth\Access\Response;

class JobListingPolicy {
    /**
     * Determine whether the user can view any models.
     */
    public function viewAny(?User $user): bool {
        return true;
    }

    public function viewAnyEmployer(User $user): bool {
        return true;
    }

    /**
     * Determine whether the user can view the model.
     */
    public function view(?User $user, JobListing $jobListing): bool {
        return true;
    }

    public function viewEmployer(User $user, JobListing $jobListing): bool {
        return $user->employer->id === $jobListing->employer->id;
    }

    /**
     * Determine whether the user can create models.
     */
    public function create(User $user): bool {
        return $user->employer !== null;
    }

    /**
     * Determine whether the user can update the model.
     */
    public function update(User $user, JobListing $jobListing): bool | Response {
        if ($jobListing->employer->user_id !== $user->id) {
            return Response::deny('Cannot update a job you do not own');
        }

        if ($jobListing->jobListingApplications()->count() > 0) {
            return Response::deny('Cannot update a job with applications.');
        }

        return true;
    }

    /**
     * Determine whether the user can delete the model.
     */
    public function delete(User $user, JobListing $jobListing): bool {
        return $jobListing->employer->user_id === $user->id;
    }

    /**
     * Determine whether the user can restore the model.
     */
    public function restore(User $user, JobListing $jobListing): bool {
        return $jobListing->employer->user_id === $user->id;
    }

    /**
     * Determine whether the user can permanently delete the model.
     */
    public function forceDelete(User $user, JobListing $jobListing): bool {
        return $jobListing->employer->user_id === $user->id;
    }

    public function apply(User $user, JobListing $jobListing): bool | Response {
        if ($user->employer->id === $jobListing->employer_id) {
            return Response::deny('You cannot apply to a Job Listing you owned.');
        }

        return !$jobListing->hasUserApplied($user);
    }
}
