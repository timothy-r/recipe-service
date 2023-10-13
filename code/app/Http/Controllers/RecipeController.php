<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Database\Eloquent\Collection;

use App\Models\Recipe;

class RecipeController extends Controller
{

    /**
     * return an array of recipes
     * max page size = 10, allow requests to reduce this
     */
    public function list(Request $request) : Collection {
        $limit = 10;

        return Recipe::all()->take($limit);
    }
}
