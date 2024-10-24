<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class JobListingApplication extends Model {
    use HasFactory;

    protected $fillable = ['expected_salary', 'user_id', 'job_listing_id', 'cv_path'];

    public function jobListing(): BelongsTo {
        return $this->belongsTo(JobListing::class);
    }

    public function user(): BelongsTo {
        return $this->belongsTo(User::class);
    }
}
