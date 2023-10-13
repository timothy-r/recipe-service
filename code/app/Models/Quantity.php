<?php
namespace App\Models;

use \App\Models\Unit;

/**
 * Value object
 * Represents an amount of a unit (of an Ingredient)
 * eg 2.5 grammes (of sugar)
 * 
 * Supports conversion between Unit
 * Supports basic mathematical functions on amount (eg. multiply by 2)
 */
class Quantity
{
    /**
     */
    private float $amount;

    /**
     * Units of the Quantity
     */
    private Unit $unit;

    /**
     * 
     */
    public function __construct(float $amount, Unit $unit) {
        $this->amount = $amount;
        $this->unit = $unit;
    }

    public function amount():  float
    {
        return $this->amount;
    }

    public function unit(): Unit 
    {
        return $this->unit;
    }

    /**
     * convert this Quantities units to another
     * conversions are only allowed between Quantities of convertible units
     */
    public function convertTo(Unit $target) {
        
        if ($this->unit->canConvertTo($target)) {
            $new_amount = $this->unit->convertAmount($target, $this->amount);
            return new Quantity($new_amount, $target);
        } else {
            return null;
        }
    }
}