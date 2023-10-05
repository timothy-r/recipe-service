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
}