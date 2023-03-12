<?php

namespace Database\Factories;

use App\Models\Review;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Model>
 */
class ReviewFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        return [
            'idUse' => fake()->numberBetween(1,60),
            'idClo' => fake()->numberBetween(1,40),
            'score' => fake()->numberBetween(1, 5),
            'comment' => fake()->paragraph(),
        ];
    }
}
