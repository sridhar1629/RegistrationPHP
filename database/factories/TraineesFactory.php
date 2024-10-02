<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\User>
 */
class TraineesFactory extends Factory
{

    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'user_id'=>fake()->number(),
            'name'=>fake()->name(),
            'firstname'=>fake()->name(),
            'location'=>fake()->name(),
            'description'=>fake()->text(300),
            'industrys'=>fake()->name(),
            'cv'=>fake()->name(),
            'degree'=>fake()->name(),
            'jobposition'=>fake()->name(),
        ];
    }
}
