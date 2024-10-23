<?php

namespace App\Models;

use Illuminate\Auth\Authenticatable;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Query\Builder as QueryBuilder;

class JobListing extends Model {
    use HasFactory;

    public static array $experience = ['Entry', 'Intermediate', 'Senior'];
    public static array $category = ['IT', 'Finance', 'Sales', 'Marketing'];
    public static array $type = ['Part-Time', 'Full-Time'];
    public static array $itTags = [
        'Frontend Web Development',
        'HTML',
        'CSS',
        'JavaScript',
        'Backend Development',
        'PHP',
        'Laravel',
        'Vue.js'
    ];
    public static array $financeTags = [
        'Financial Analyst',
        'Investment Banking',
        'Accounting',
        'Auditing',
        'Tax Consultant',
        'Risk Management',
        'Financial Planning',
        'Corporate Finance'
    ];
    public static array $salesTags = [
        'Account Executive',
        'Business Development',
        'Sales Manager',
        'Sales Representative',
        'Sales Coordinator',
        'Lead Generation',
        'Sales Strategy',
        'Sales Operations'
    ];
    public static array $marketingTags = [
        'Digital Marketing',
        'Content Marketing',
        'SEO Specialist',
        'Social Media Manager',
        'Email Marketing',
        'Marketing Strategy',
        'Brand Manager',
        'Marketing Coordinator'
    ];

    public function scopeFilter(Builder | QueryBuilder $query, array $filters): Builder|QueryBuilder {
        return $query->when($filters['keyword'] ?? null, function ($query, $keyword) {
            $query->where(function ($query) use ($keyword) {
                $query->where('title', 'like', '%' . $keyword . '%')
                    ->orWhere('description', 'like', '%' . $keyword . '%')
                    ->orWhereHas('employer', function ($query) use ($keyword) {
                        $query->where('company_name', 'like', '%' . $keyword . '%');
                    });
            });
        })->when($filters['location'] ?? null, function ($query, $location) {
            $query->where('location', 'like', '%' . $location . '%');
        })->when($filters['min_salary'] ?? null, function ($query, $minSalary) {
            $query->where('salary', '>=', $minSalary);
        })->when($filters['max_salary'] ?? null, function ($query, $maxSalary) {
            $query->where('salary', '<=', $maxSalary);
        })->when($filters['experience'] ?? null, function ($query, $experiece) {
            $query->where('experience', $experiece);
        })->when($filters['category'] ?? null, function ($query, $category) {
            $query->where('category', $category);
        })->when($filters['type'] ?? null, function ($query, $type) {
            $query->where('type', $type);
        })->when($filters['tag'] ?? null, function ($query, $tag) {
            $query->where('tags', 'like', '%' . $tag . '%');
        });
    }

    public function hasUserApplied(Authenticatable|User|int $user): bool {
        return $this->where('id', $this->id)
            ->whereHas(
                'jobListingApplications',
                fn($query) => $query->where('user_id', '=', $user->id ?? $user)
            )->exists();
    }

    public function employer(): BelongsTo {
        return $this->belongsTo(Employer::class);
    }

    public function user(): BelongsTo {
        return $this->belongsTo(User::class);
    }

    public function jobListingApplications(): HasMany {
        return $this->hasMany(JobListingApplication::class);
    }
}
