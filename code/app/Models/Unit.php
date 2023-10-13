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
     * Determine if a Unit can be convert into another 
     */
    public function canConvertTo(Unit $target): bool {
        
        return $this->type() == $target->type();
        
    }
}