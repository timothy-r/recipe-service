<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;
use Database\Seeders\RecipeSeeder;

class RecipeTest extends TestCase
{
    use RefreshDatabase;

    /**
     */
    public function test_the_application_returns_a_list_of_recipes(): void
    {

        $default_page_length = 10;

        $this->seed(RecipeSeeder::class);

        $response = $this->get('/api/recipes');

        $response->assertStatus(200);

        $response->assertJsonCount($default_page_length);

    }

    public function test_the_application_returns_a_shorter_list_of_recipes(): void
    {

        $pagesize = 5;

        $this->seed(RecipeSeeder::class);

        $response = $this->get('/api/recipes?pagesize='.$pagesize);

        $response->assertStatus(200);

        $response->assertJsonCount($pagesize);

    }

    public function test_cannot_override_max_recipe_length(): void
    {

        $max_page_length = 10;

        $this->seed(RecipeSeeder::class);

        $response = $this->get('/api/recipes?pagesize=4000');

        $response->assertStatus(200);

        $response->assertJsonCount($max_page_length);

    }
}
