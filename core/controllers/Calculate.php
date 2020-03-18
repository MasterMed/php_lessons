<?php

function funcAddition($a, $b) {
    return $a + $b;
}

function funcSubtraction($a, $b) {
    return $a - $b;
}

function funcMultiplication($a, $b) {
    return $a * $b;
}

function funcDivision($a, $b) {
    return $a / $b;
}

function funcPower($val, $pow) {
  if ($pow > 2) {
    $mid = funcPower($val, --$pow);
  } else {
    $mid = $val;
  }
  $result = $mid * $val;
  return $result;
}  

function mathOperation($arg1, $arg2, $operation) {
    switch ($operation) {
        case 'addition':
            $result = funcAddition($arg1, $arg2);
            break;
        case 'subtraction':
            $result = funcSubtraction($arg1, $arg2);
            break;
        case 'multiplication':
            $result = funcMultiplication($arg1, $arg2);
            break;
        case 'division':
            $result = funcDivision($arg1, $arg2);
            break;
        case 'power':
            $result = funcPower($arg1, $arg2);
            break;
        default:
            $result = 'Не верно введено наименование оператора.';
    }
    return $result;
}

function actionIndex() {
    if (AJAX) {
        $first = $_POST['first'];
        $second = $_POST['second'];
        $operator = strval($_POST['action']);
        return mathOperation($first, $second, $operator);
    }
    templater_addView('{{content}}', 'calculator/calculate_index');
}

function actionSecond() {
    templater_addView('{{content}}', 'calculator/calculate_second');
}

function actionAlternative() {
    templater_addView('{{content}}', 'calculator/calculate_alt');
}
