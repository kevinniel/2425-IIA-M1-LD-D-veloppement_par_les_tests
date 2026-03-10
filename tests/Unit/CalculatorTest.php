<?php

declare(strict_types=1);

namespace Tests\Unit;

use App\Calculator;
use PHPUnit\Framework\TestCase;
use TypeError;


/*

Liste des cas qu'on peut tester : 
- TypeError
- 

*/
final class CalculatorTest extends TestCase
{
    public function testItAddsTwoIntegers(): void
    {
        $calculator = new Calculator();

        self::assertSame(4, $calculator->add(2, null));
        self::assertSame(206000, $calculator->add(101000, 105000));
        self::assertSame(0, $calculator->add(-2, 2));
        self::assertSame(5, $calculator->add(2.25, 2.75));
    }

    public function testItThrowsTypeErrorWhenRightOperandIsNotAnInteger(): void
    {
        $calculator = new Calculator();

        $this->expectException(TypeError::class);

        $calculator->add(-2, "a");
    }
}
