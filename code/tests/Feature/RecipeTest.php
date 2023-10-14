<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class RecipeTest extends TestCase
{
    use RefreshDatabase;

    /**
     * Indicates whether the default seeder should run before each test.
     *
     * @var bool
     */
    protected $seed = true;

    /**
     */
    public function test_the_application_returns_a_list_of_recipes(): void
    {

        $default_page_length = 10;

        $response = $this->get('/api/recipes');

        $response->assertStatus(200);

        $response->assertJsonCount($default_page_length);

    }

    public function test_the_application_returns_a_shorter_list_of_recipes(): void
    {

        $pagesize = 5;

        $response = $this->get('/api/recipes?pagesize='.$pagesize);

        $response->assertStatus(200);

        $response->assertJsonCount($pagesize);

    }

    public function test_cannot_override_max_recipe_length(): void
    {

        $max_page_length = 10;

        $response = $this->get('/api/recipes?pagesize=4000');

        $response->assertStatus(200);

        $response->assertJsonCount($max_page_length);

    }

    public function test_recipe_ingredients() : void 
    {
        $response = $this->get('/api/recipes');

        $response->assertStatus(200);

        // $response->assertJsonPath();
    }
}
