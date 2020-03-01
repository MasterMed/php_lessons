<?php

/* 
 * Объединить две ранее написанные функции в одну, которая получает строку на 
 * русском языке, производит транслитерацию и замену пробелов на подчеркивания 
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
        $transLatLib[] = $latLit;
    }
    return str_replace($transRusLib, $transLatLib, mb_strtolower($rusString) );
}

function replaceSpaces($string) {
    return str_replace(' ', '_', $string);
}

function getUrl($string) {
    return replaceSpaces( transliterate($string) );
}

echo getUrl('В будущем для доступа к истории');