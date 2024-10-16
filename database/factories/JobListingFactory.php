<?php

namespace Database\Factories;

use App\Models\JobListing;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\JobListing>
 */
class JobListingFactory extends Factory {
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array {

        $category = fake()->randomElement(JobListing::$category);

        $tags = match ($category) {
            'IT' => JobListing::$itTags,
            'Finance' => JobListing::$financeTags,
            'Sales' => JobListing::$salesTags,
            'Marketing' => JobListing::$marketingTags,
            default => []
        };

        return [
            'title' => fake()->jobTitle(),
            'description' => fake()->paragraph(3, true),
            'salary' => fake()->numberBetween(5_000, 150_000),
            'company' => fake()->company(),
            'logo' => 'https://picsum.photos/seed/picsum/200/300',
            'location' => fake()->city(),
            'category' => $category,
            'experience' => fake()->randomElement(JobListing::$experience),
            'type' => fake()->randomElement(JobListing::$type),
            'tags' => join(',', fake()->randomElements($tags, 3)),
        ];
    }
}
