<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Employer extends Model {
    /** @use HasFactory<\Database\Factories\EmployerFactory> */
    use HasFactory;

    public function jobListings(): HasMany {
        return $this->hasMany(JobListing::class);
    }
}
