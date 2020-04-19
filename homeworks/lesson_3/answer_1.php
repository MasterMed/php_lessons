<?php
/*
С помощью цикла while вывести все числа в промежутке от 0 до 100, 
которые делятся на 3 без остатка.
*/

function getThreeMultiples($start, $end) {
    $current = $start;
    $return = array();
    while ($current <= $end) {
        if($current % 3 === 0) {
            $return[] = $current;
        }
        $current++;
    }
    return implode(', ', $return);
}

echo getThreeMultiples(0, 100);