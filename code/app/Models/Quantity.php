<?php
namespace App\Models;

use \App\Models\Unit;

/**
 * Value object
 * Represents an amount of a unit (of an Ingredient)
 * eg 2.5 grammes (of sugar)
 * 
 * Supports conversion between Units
 */
class Quantity
{
    /**
     * 
     */
    private float $amount;

    /**
     * Units of the amount
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
}