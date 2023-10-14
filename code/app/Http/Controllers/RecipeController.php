<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Database\Eloquent\Collection;

use App\Models\Recipe;

class RecipeController extends Controller
{

    private $default_page_size = 10;

    /**
     * return an array of recipes
     * max page size = 10, allow requests to reduce this
     */
    public function list(Request $request) : Collection {

        # get requested pagesize from the request
        $pagesize = $request->input('pagesize', $this->default_page_size);

        # constrain to max size
        $pagesize = min($pagesize, $this->default_page_size);

        return Recipe::all()->take($pagesize);
    }
}
