<?php

namespace Database\Factories;

use App\Models\JobListing;
use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends Factory<JobListing>
 */
class JobListingFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            //'user_id' => User::factory(),
            'user_id' => User::inRandomOrder()->value('id'),

            'title' => fake()->jobTitle(),
            'description' => fake()->paragraphs(3, true),
            'salary' => fake()->numberBetween(20000, 150000),

            'tags' => fake()->randomElement([
                'PHP, Laravel, MySQL',
                'JavaScript, React, Next.js',
                'Python, Django, PostgreSQL',
                'HTML, CSS, Bootstrap',
            ]),

            'job_type' => fake()->randomElement([
                'Full-Time',
                'Part-Time',
                'Contract',
                'Temporary',
                'Internship',
                'Volunteer',
                'On-Call',
            ]),

            'remote' => fake()->boolean(),

            'requirements' => fake()->paragraphs(2, true),
            'benefits' => fake()->paragraphs(2, true),

            'address' => fake()->streetAddress(),
            'city' => fake()->city(),
            'state' => fake()->state(),
            'zipcode' => fake()->postcode(),

            'contact_email' => fake()->companyEmail(),
            'contact_phone' => fake()->phoneNumber(),

            'company_name' => fake()->company(),
            'company_description' => fake()->paragraph(),
            'company_logo' => null,
            'company_website' => fake()->url(),
        ];
    }
}
