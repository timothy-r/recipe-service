<?php

namespace Tests\Feature;

// use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class RecipeTest extends TestCase
{
    /**
     */
    public function test_the_application_returns_a_list_of_recipes(): void
    {
        $response = $this->get('/recipes');

        $response->assertStatus(200);
    }
}
