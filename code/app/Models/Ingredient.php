<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Concerns\HasUuids;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
class Ingredient extends Model
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
     * The recipes that use this ingredient
     */
    public function recipes(): BelongsToMany
    {
        return $this->belongsToMany(Recipe::class)->using(RecipeIngredient::class);
    }
}
