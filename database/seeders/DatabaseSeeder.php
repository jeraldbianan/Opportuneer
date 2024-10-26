<?php

namespace Database\Seeders;

use App\Models\User;
use Database\Factories\UserFactory;
// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class DatabaseSeeder extends Seeder {
    /**
     * Seed the application's database.
     */
    public function run(): void {
        // User::create([
        //     'name' => 'Jerald Bianan',
        //     'email' => 'jeraldbianan@test.com',
        //     'password' => Hash::make('password'),
        // ]);

        $this->call([
            UserSeeder::class,
            EmployerSeeder::class,
            JobListingSeeder::class,
            JobListingApplicationSeeder::class
        ]);
    }
}
