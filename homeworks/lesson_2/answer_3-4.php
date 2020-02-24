<?php
/**
 * Сумма двух числел
 * @param integer $a Первое число операции
 * @param integer $b Второе число операции
 * @returns integer Сумма чисел $a и $b 
 */
function funcAddition(int $a, int $b) {
  return $a + $b;
}

/**
 * Разность двух числел
 * @param integer $a Первое число операции
 * @param integer $b Второе число операции
 * @returns integer Разность чисел $a и $b
 */
function funcSubtraction(int $a, int $b) {
  return $a - $b;
}

/**
 * Произведение двух числел
 * @param integer $a Первое число операции
 * @param integer $b Второе число операции
 * @returns integer Произведение чисел $a и $b 
 */
function funcMultiplication(int $a, int $b) {
  return $a * $b;
}

/**
 * Частное от двух числел
 * @param integer $a Первое число операции
 * @param integer 4b Второе число операции
 * @returns integer Частное от чисел $a и $b
 */
function funcDivision(int $a, int $b) {
  return $a / $b;
}

/**
 * Получить результат одной и 4-х математических операций с двумя числами
 * @param integer $arg1 Первое число операции
 * @param integer $arg2 Второе число операции
 * @param {String} $operation Строковой идентификатор операции: addition, subtraction, multiplication, division
 * @returns integer
 */
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
    default:
      $result = 'Не верно введено наименование оператора.';
  }
  return result;
}

// Второй вариант
function mathOperation_v2($arg1, $arg2, $operation) {
    $operation = 'func'.ucfirst($operation);
    return $operation($arg1, $arg2);
}