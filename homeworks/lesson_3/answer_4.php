<?php

/*
 * Объявить массив, индексами которого являются буквы русского языка, а 
 * значениями – соответствующие латинские буквосочетания (‘а’=> ’a’, ‘б’ => ‘b’, 
 * ‘в’ => ‘v’, ‘г’ => ‘g’, …, ‘э’ => ‘e’, ‘ю’ => ‘yu’, ‘я’ => ‘ya’).
 */

function transliterate($rusString) {
    $transLib = array(
        "ё" => "yo", "а" => "a", "б" => "b", "в" => "v", "г" => "g", "д" => "d",
        "е" => "e", "ж" => "zh", "з" => "z", "и" => "i", "й" => "y", "к" => "k",
        "л" => "l", "м" => "m", "н" => "n", "о" => "o", "п" => "p", "р" => "r",
        "с" => "s", "т" => "t", "у" => "u", "ф" => "f", "х" => "h", "ц" => "ts",
        "ч" => "ch", "ш" => "sh", "щ" => "sch", "ъ" => "", "ы" => "yi", "ь" => "",
        "э" => "e", "ю" => "yu", "я" => "ya"
    );
    foreach($transLib as $rusLit => $latLit) {
        $transRusLib[] = $rusLit;
        $transRusLib[] = mb_strtoupper($rusLit);
        $transLatLib[] = $latLit;
        $transLatLib[] = mb_strtoupper($latLit);
    }
    return str_replace($transRusLib, $transLatLib, $rusString);
}

echo transliterate('Объявить МАССИВ, индексами которого являются буквы Русского языка.');