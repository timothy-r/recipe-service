<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Concerns\HasUuids;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;

/**
 * Encapsulates a Recipe
 * contains Ingredients with Quantities (bond table recipe_id, quantity, ingredient_id)
 * contains ordered Steps to follow (step table has an index and recipe_id)
 * Quantity type has an amount and a Unit (grammes, ounces, spoons, kilos etc) - 
 *  store both in the recipe <-> ingredient bond table, Quantity is a value object
 * Unit is an enum of supported units
 */
class Recipe extends Model
{
    use HasFactory;
    use HasUuids;

    /**
     * The data type of the ID
     *
     * @var string
     */
    protected $keyType = 'string';
    
    /**
     * Indicates if the model's ID is auto-incrementing.
     *
     * @var bool
     */
    public $incrementing = false;

    /**
     * The ingredients used in the recipe
     */
    public function ingredients(): BelongsToMany
    {
        return $this->belongsToMany(Ingredient::class)->using(RecipeIngredient::class);
    }
}
