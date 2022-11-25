<?php

use PHPUnit\Framework\TestCase;

require_once "CalculatorSub.php";
require_once "CalculatorMul.php";
require_once "CalculatorSum.php";
require_once "CalculatorDiv.php";

final class localTest extends TestCase
{

    /**
     * @dataProvider sumData
     */

    function testSum($a, $b, $d)
    {

        $j = (new CalculatorSumService)->getSum($a, $b);
        $this->assertSame($j, $d);
    }
    /**
     * @dataProvider subData
     */

    function testSub($a, $b, $d)
    {

        $j = (new CalculatorSubService)->getSub($a, $b);
        $this->assertSame($j, $d);
    }
    /**
     * @dataProvider mulData
     */

    function testMul($a, $b, $d)
    {

        $j = (new CalculatorMulService)->getMul($a, $b);
        $this->assertSame($j, $d);
    }
    /**
     * @dataProvider divData
     */

    function testDiv($a, $b, $d)
    {

        $j = (new CalculatorDivService)->getDiv($a, $b);
        $this->assertSame($j, $d);
    }

    function sumData()
    {
        return [
            [0, 0, 0],
            [1, 1, 4],
            [-1, 5, 4],
            [2, 2, 4],
            [1, 2, 4]
        ];
    }
    function subData()
    {
        return [
            [0, 0, 0],
            [1, 1, 4],
            [-1, -5, 4],
            [2, 2, 0],
            [-2, 2, -4]
        ];
    }
    function mulData()
    {
        return [
            [0, 0, 0],
            [1, 1, 1],
            [-1, 5, -5],
            [2, 2, 4],
            [1, 2, 4]
        ];
    }
    function divData()
    {
        return [
            [0, 0, 0],
            [1, 1, 1],
            [-1, 5, 4],
            [2, 2, 1],
            [1, 2, 0]
        ];
    }
}
