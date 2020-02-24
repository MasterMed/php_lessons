<?php

function power($val, $pow) {
  if ($pow > 2) {
    $mid = power($val, --$pow);
  } else {
    $mid = $val;
  }
  $result = $mid * $val;
  return $result;
}  
