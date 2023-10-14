<?php
namespace App\Models;

/**
 * Also IngredientCondition? eg raw, cooked, dried, frozen, preserved etc? 
 * should this be more general eg liquid, powder, grain?
 */
enum IngredientType
{
    case Fruit;
    case Herb; // ???
    case Vegetable;
    case Fish;
    case Meat;
    case Cheese;
    case Grain;
    case Sauce;
    case Oil;
    case Juice;
    case Spice; // ??
    case Mineral; // eg Salt or use Spice?
    case Bakery; //?? bread, biscuit...

    /// what about eggs?? milk?? 

}