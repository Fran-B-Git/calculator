<?php

use PHPUnit\Framework\TestCase;

require_once "CalculatorSub.php";
require_once "CalculatorMul.php";
require_once "CalculatorSum.php";
require_once "CalculatorDiv.php";

final class localTest extends TestCase
{



    function testSum()
    {
        $a = 2;
        $b = 3;
        $j = (new CalculatorSumService)->getSum($a, $b);
        $this->assertSame($j, 5);
    }
    function testSub()
    {
        $a = 2;
        $b = 3;
        $j = (new CalculatorSubService)->getSub($a, $b);
        $this->assertSame($j, -1);
    }
    function testMul()
    {
        $a = 2;
        $b = 3;
        $j = (new CalculatorMulService)->getMul($a, $b);
        $this->assertSame($j, 6);
    }
    function testDiv()
    {
        $a = 6;
        $b = 3;
        $j = (new CalculatorDivService)->getDiv($a, $b);
        $this->assertSame($j, 2);
    }
}
