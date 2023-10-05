<?php 

namespace Tests\Unit;

use PHPUnit\Framework\TestCase;

use \App\Models\Quantity;
use \App\Models\Unit;

class QuantityTest extends TestCase
{
    /**
     */
    public function test_quantity(): void
    {
        $amount = 100.0;
        $unit = Unit::Gram;

        $quantity = new Quantity($amount, $unit);
        
        $this->assertTrue($quantity->amount() == $amount);
        $this->assertTrue($quantity->unit() == $unit);
    }
}
