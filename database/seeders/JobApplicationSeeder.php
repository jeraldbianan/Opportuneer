<?php

namespace Database\Seeders;

use App\Models\JobApplication;
use App\Models\JobListing;
use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class JobApplicationSeeder extends Seeder {
    /**
     * Run the database seeds.
     */
    public function run(): void {
        $users = User::all()->shuffle();

        foreach ($users as $user) {
            $jobs = JobListing::inRandomOrder()->take(rand(0, 4))->get();

            foreach ($jobs as $job) {
                JobApplication::factory()->create([
                    'job_listing_id' => $job->id,
                    'user_id' => $user->id
                ]);
            }
        }
    }
}
