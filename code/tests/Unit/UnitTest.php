<?php 

namespace Tests\Unit;

use PHPUnit\Framework\TestCase;

use \App\Models\Unit;

/**
 * A unit test of a Unit, ha ha ha
 */
class UnitTest extends TestCase
{
    public function test_can_convert_same_type_of_unit() : void 
    {
        
        $units = [Unit::Gram, Unit::Kilo, Unit::TeaSpoon, Unit::TableSpoon, Unit::Ounce, Unit::Pound, Unit::Milliliter, Unit::Liter, Unit::FluidOunce, Unit::Pint];
        
        foreach ($units as $unit){
            $this->assertTrue($unit->canConvertTo($unit));
        }
    }

    public function test_can_convert_between_solids() : void 
    {
        $units = [Unit::Gram, Unit::Kilo, Unit::TeaSpoon, Unit::TableSpoon, Unit::Ounce, Unit::Pound];
        
        foreach ($units as $unit){
            foreach ($units as $other_unit) {
                if ($unit != $other_unit){
                    $this->assertTrue($unit->canConvertTo($other_unit));
                }
            }
            
        }
    }

    public function test_can_convert_between_liquids() : void 
    {
        $units = [Unit::Milliliter, Unit::Liter, Unit::FluidOunce, Unit::Pint];
        
        foreach ($units as $unit){
            foreach ($units as $other_unit) {
                if ($unit != $other_unit){
                    $this->assertTrue($unit->canConvertTo($other_unit));
                }
            }
        }
    }

    public function test_convert_kilos() : void 
    {
        $items = [
            [Unit::Kilo, 1.0],
            [Unit::Gram, 1000.0]
        ];
        
        $unit = Unit::Kilo;
        $amount = 1.0;

        foreach ($items as $item) {

            $result = $unit->convertAmount($item[0], $amount);
            $this->assertEquals($item[1], $result);
        }
    }

    public function test_convert_grams() : void 
    {
        $items = [
            [Unit::Kilo, 0.001],
            [Unit::Gram, 1.0],
            [Unit::Pound, 0.0022],
            [Unit::Ounce, 0.0353],
            [Unit::TeaSpoon, 0.2381],
            [Unit::TableSpoon, 0.0676]
        ];
        
        $unit = Unit::Gram;
        $amount = 1.0;

        foreach ($items as $item) {

            $result = $unit->convertAmount($item[0], $amount);
            $this->assertEquals($item[1], $result);
        }
    }


}