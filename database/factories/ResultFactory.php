<?php

namespace Database\Factories;

use App\Models\Test;
use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Result>
 */
class ResultFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'test_id' => Test::inRandomOrder()->first()?->id,
            'user_id' => User::inRandomOrder()->first()?->id,
            'result' => fake()->numberBetween(0,100),
        ];
    }
}
