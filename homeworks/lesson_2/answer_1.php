<?php

function taskNumberOne(int $num1, int $num2) {

    if ($num1 >= 0 AND $num2 >= 0) {
        if ($num1 >= $num2) {
            $returnSum = $num1 - $num2;
        } else {
            $returnSum = $num2 - $num1;
        }
    } elseif ($num1 < 0 AND $num2 < 0) {
        $returnSum = $num1 * $num2;
    } else {
        $returnSum = $num1 + $num2;
    }
    return $returnSum;
    
}
