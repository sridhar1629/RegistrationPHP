<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\User>
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
            'user_id' => fake()->number(),
            'company_id' => fake()->number(),
            'company_name' => fake()->name(),
            'location' => fake()->name(),
            'jobtitle' => fake()->name(),
            'description'=>fake()->text(300),
            'salary'=>fake()->name(),
            'industry'=>fake()->name(),
            'degree'=>fake()->name(),
            'duration'=>fake()->number(),
            'type'=>fake()->name(),
            'requirements'=>fake()->text(300),
            'state'=>fake()->name(),
        ];
    }
}
