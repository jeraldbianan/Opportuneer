<?php

namespace Database\Seeders;

use App\Models\Employer;
use App\Models\JobListing;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class JobListingSeeder extends Seeder {
    /**
     * Run the database seeds.
     */
    public function run(): void {
        $employers = Employer::all();

        for ($i = 0; $i < 100; $i++) {
            JobListing::factory()->create([
                'employer_id' => $employers->random()
            ]);
        }
    }
}
