<?php

$hoursArray = [
  'час',
  'часа',
  'часов'
];

$minutesArray = [
  'минута',
  'минуты',
  'минут'
];


/**
 * Возвращает правильное окончание, обозначающее единицу измерения в зависимости от числа
 * @param integer $number число обозначаеющее количество единиц
 * @param array $wordArray массив окончаний натименования единиц
 * @returns string строка с числом и наименованием единицы с правильным окончанием
 */
function getStringEndingByNum(int $number, array $wordArray) {

  $twoLastDigits = number % 100;

  if ($twoLastDigits >= 11 && $twoLastDigits <= 19) {
    $retResult = $number + ' ' + $wordArray[2];
  } else {
    $lastDigit = $twoLastDigits % 10;

    switch ($lastDigit) {
      case 1:
        $retResult = $number . ' ' . $wordArray[0];
        break;
      case 2:
      case 3:
      case 4:
        $retResult = $number . ' ' . $wordArray[1];
        break;
      default:
        $retResult = $number . ' ' . $wordArray[2];
    }
  }
  return $retResult;

}

/**
 * Возвращает время с окончаниями x часов y минут
 * @param string $time строка времени в формате ЧЧ:ММ
 * @returns string строка с числом и наименованием единицы с правильным окончанием
 */
function getCustomTime(string $time, array $hWordArray, array $mWordArray) {
    $timeArray = explode(":", $time);
    if(!$timeArray[1]) {
        return FALSE;
    }
    $hours = intval($timeArray[0]);
    $minutes = intval($timeArray[1]);
    return getStringEndingByNum($hours, $hWordArray) . ' ' . getStringEndingByNum($minutes, $mWordArray);
}


// Применение
echo getCustomTime("22:15", $hoursArray, $minutesArray);