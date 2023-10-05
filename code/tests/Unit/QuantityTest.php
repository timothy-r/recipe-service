<?php 

namespace Tests\Unit;

use PHPUnit\Framework\TestCase;

use \App\Models\Quantity;

class QuantityTest extends TestCase
{
    /**
     */
    public function test_quantity(): void
    {
        $amount = 100.0;
        $unit = 'grammes';

        $quantity = new Quantity($amount, $unit);

        $this->assertTrue($quantity->amount == $amount);
        $this->assertTrue($quantity->unit == $unit);
    }
}
