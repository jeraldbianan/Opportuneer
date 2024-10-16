<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

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
}
