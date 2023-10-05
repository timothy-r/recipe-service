<?php

namespace App\Models;

/**
 * Represents an amount of a unit (of an Ingredient)
 * eg 2.5 grammes (of sugar)
 */
class Quantity
{
    public function __construct($amount, $unit) {
        $this->amount = $amount;
        $this->unit = $unit;
    }

    public function amount():  float
    {
        return $this->amount;
    }

    public function unit(): string 
    {
        return $this->unit;
    }
}