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

    public function test_convert_grams_to_kilos() : void 
    {
        $unit = Unit::Gram;
        $amount = 1000.0;

        $result = $unit->convertAmount(Unit::Kilo, $amount);

        $this->assertEquals(1.0, $result);
    }

    public function test_convert_grams_to_grams() : void 
    {
        $unit = Unit::Gram;
        $amount = 1000.0;

        $result = $unit->convertAmount(Unit::Gram, $amount);

        $this->assertEquals(1000.0, $result);
    }

    public function test_convert_grams_to_ounces() : void 
    {
        $unit = Unit::Gram;
        $amount = 1000.0;

        $result = $unit->convertAmount(Unit::Ounce, $amount);

        $this->assertEquals(35.3, $result);
    }

    public function test_convert_grams_to_pounds() : void 
    {
        $unit = Unit::Gram;
        $amount = 1000.0;

        $result = $unit->convertAmount(Unit::Pound, $amount);

        $this->assertEquals(2.2, $result);
    }

    public function test_convert_grams_to_teaspoons() : void 
    {
        $unit = Unit::Gram;
        $amount = 1.0;

        $result = $unit->convertAmount(Unit::TeaSpoon, $amount);

        $this->assertEquals(0.2381, $result);
    }

    public function test_convert_grams_to_tablespoons() : void 
    {
        $unit = Unit::Gram;
        $amount = 1.0;

        $result = $unit->convertAmount(Unit::TableSpoon, $amount);

        $this->assertEquals(0.0676, $result);
    }
}