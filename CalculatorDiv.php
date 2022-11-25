<?php

class CalculatorDivService{
    
    public function getDiv(int $a, int $b){
        if($b == 0){
            throw new RuntimeException(("Division by 0 is not allowed"));
    
        }
        return $a/$b;
    }
}