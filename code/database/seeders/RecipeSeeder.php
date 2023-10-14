<?php

namespace Database\Seeders;

use App\Models\Ingredient;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

use App\Models\Recipe;

class RecipeSeeder extends Seeder
{

    /**
     */
    public function run(): void
    {
        foreach(range(1,20) as $i){

            $ingredients = Ingredient::factory()->count(3)->create();
            
            $recipe = Recipe::factory()
                ->count(1)
                ->hasAttached($ingredients, ['amount' => 1.0, 'unit' => 'Gram'])
                ->create();
     
        }
    }
}
