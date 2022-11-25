<?php

use PHPUnit\Framework\TestCase;

require_once "CalculatorSub.php";
require_once "CalculatorMul.php";
require_once "CalculatorSum.php";
require_once "CalculatorDiv.php";

final class maintest extends TestCase
{

    function yeet($w)
    {
        $c = curl_init();
        curl_setopt($c, CURLOPT_POST, 1);
        curl_setopt($c, CURLOPT_URL, "http://localhost:8000/api/$w");
        curl_setopt($c, CURLOPT_RETURNTRANSFER, 1);
        $j = curl_exec($c);
        curl_close($c);
        return $j;
    }


    function testSum()
    {
        $j = $this->yeet("sum");
        $this->assertSame(intval($j),3);
    }
    function testSub()
    {
        $j = $this->yeet("sub");
        $this->assertSame(intval($j),-1);

    }
    function testMul()
    {
        $j = $this->yeet("mul");
        $this->assertSame(intval($j),2);

    }
    function testDiv()
    {
        $j = $this->yeet("div");
        $this->assertSame(intval($j),4);
    }

    function testJson(){
        $a["hello"] = "yeet";
        $a["bye"] = "yoink";
        $j = $this->yeet("json");
        $this->assertSame($j,json_encode($a));
    }
}
