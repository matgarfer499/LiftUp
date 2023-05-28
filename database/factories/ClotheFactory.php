<?php

namespace Database\Factories;

use App\Models\Clothe;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Model>
 */
class ClotheFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        return [
            'type_product' => fake()->randomElement(['camiseta', 'sudadera', 'pantalon', 'short', 'tank', 'tirante']),
            'name' => fake()->word(),
            'gender' => fake()->randomElement(['H', 'M']),
            'discount' => fake()->numberBetween(0, 1),
            'discount_rate' => fake()->randomElement([10, 20, 30, 40, 50]),
            'price' => fake()->randomFloat(1, 5, 100),
            'description' => fake()->paragraph(),
            'material' => fake()->paragraph(),
        ];
    }
}
