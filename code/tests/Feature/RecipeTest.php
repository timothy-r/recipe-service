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

        $response->dump();

        $response->assertStatus(200);

        $response->assertJsonCount($default_page_length);

    }
}
