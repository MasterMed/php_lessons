<?php

/*
 * С помощью цикла do…while написать функцию для вывода чисел от 0 до 10
 */

function getOddEven($min, $max) {
    $current = $min;
    $ret = array();
    do {
        if ($current == 0) {
            $ret[] = '0 – ноль.';
        } elseif ($current % 2) {
            $ret[] = $current.' – нечетное число.';
        } else {
            $ret[] = $current.' – четное число.';
        }
        $current++;
    } while ($current <= $max);
    return $ret;
}

function showOddEven($min, $max, $divider) {
    $result = getOddEven($min, $max);
    return implode($divider, $result);
}

echo showOddEven(0, 10, PHP_EOL);