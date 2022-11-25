<?php

require_once "CalculatorSub.php";
require_once "CalculatorMul.php";
require_once "CalculatorSum.php";
require_once "CalculatorDiv.php";

class SimpleApi
{

    public $valid = ["method", "print", "testError"];
    function exec()
    {

        $var =  explode("/", parse_url($_SERVER["REQUEST_URI"], PHP_URL_PATH));
        if (sizeof($var) < 4) {
            $var[3] = "UwU nothing to print";
        }
        $method = $_SERVER["REQUEST_METHOD"];

        if (!in_array($method, ["POST", "GET"])) {
            http_response_code(405);
            header("Allow: GET, POST");
            exit;
        }

        $target = $var[2];
        $extra = $var[3];

        if (in_array($target, $this->valid)) {
            switch ($target) {
                case "method":
                    echo $_SERVER["REQUEST_METHOD"];
                    break;
                case "print":
                    echo $extra;
                    break;
                case "testError":
                    throw new Exception("test");
                    break;
            }
        } else {
            if ($method == "POST") {
                switch ($target) {
                    case "sum":
                        echo (new CalculatorSumService)->getSum(1, 2);
                        break;
                    case "sub":
                        echo (new CalculatorSubService)->getSub(1, 2);
                        break;
                    case "mul":
                        echo (new CalculatorMulService)->getMul(1, 2);
                        break;
                    case "div":
                        echo (new CalculatorDivService)->getDiv(20, 5);
                        break;
                    case "json":
                        $j["hello"]="yeet";
                        $j["bye"]="yoink";
                        header('Content-type: application/json');
                        echo json_encode($j);   
                }
            }
        }
    }
}
