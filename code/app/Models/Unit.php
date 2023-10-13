<?php
namespace App\Models;

/**
 * All supported units of quantities
 */
enum Unit 
{
    case Gram;
    case Kilo;
    
    case TeaSpoon;
    case TableSpoon;

    case Ounce;
    case Pound;

    case Milliliter;
    case Liter;

    case FluidOunce;
    case Pint;

    protected function type() : string
    {
        if (in_array($this, [Unit::Gram, Unit::Kilo, Unit::TeaSpoon, Unit::TableSpoon, Unit::Ounce, Unit::Pound])){
            return 'solid';
        }

        if (in_array($this, [Unit::Milliliter, Unit::Liter, Unit::FluidOunce, Unit::Pint])){
            return 'liquid';
        }
    }

    /**
     * Return the multiplier to convert from Unit::Gram to the $target
     */
    protected function multiplierFromGram(Unit $target) : float 
    {
        switch ($target) {
            case Unit::Gram:
                return 1.0;
            case Unit::Kilo:
                return 0.001;
            case Unit::Pound:
                return 0.0022;
            case Unit::Ounce:
                return 0.0353;
            case Unit::TeaSpoon:
                return 0.2381;
            case Unit::TableSpoon:
                return 0.0676;
        }

        return 0.0;
    }
    
    /**
     * Determine if a Unit can be convert into another 
     */
    public function canConvertTo(Unit $target): bool 
    {
        
        return $this->type() == $target->type();
        
    }

    /**
     * Convert the amount
     */
    public function convertAmount(Unit $target, float $amount): float
    {
        if ($this->canConvertTo($target)){
            switch ($this) {
                case Unit::Gram:
                    $multiplier = $this->multiplierFromGram($target);
                    return $amount * $multiplier;
                    break;
            }
            return 0.0;

        } else {
            return null;
        }
    }
}