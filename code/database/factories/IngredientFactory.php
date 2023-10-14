<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

use App\Models\Ingredient;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Ingredient>
 */
class IngredientFactory extends Factory
{
    protected $model = Ingredient::class;

    /**
     * Define the model's default state.
     * Read the ingredient reference data
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            // don't pass an array, pass a string of 3 words...
            'name' => fake()->words(3, true),
            'type' => fake()->word()
        ];
    }
}
