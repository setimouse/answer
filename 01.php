<?php
/*
// 仅用于结果验证
function testonly($prices) {
  $result = array_fill(0, count($prices), 0);
  for ($i = 0; $i < count($prices) - 1; $i++) {
    for ($j = $i + 1; $j < count($prices) && $prices[$i] >= $prices[$j]; $j++) {}
    $result[$i] = $j < count($prices) ? $j - $i : 0;
    // break;
  }
  return $result;
}
/*/
// 正式代码
function solution($prices) {
  $result = array_fill(0, count($prices), 0);
  $stack = [];
  for ($i = count($prices) - 1; $i >= 0; $i--) {
    while (!empty($stack)) {
      $j = array_pop($stack);
      if ($prices[$j] > $prices[$i]) {
        array_push($stack, $j);
        break;
      }
    }

    if (empty($stack)) {
      $stack[] = $i;
      $result[$i] = 0;
    } else {
      $result[$i] = $stack[count($stack) - 1] - $i;
      // printf("stack: [%s]\n", join(',', $stack));
      $stack[] = $i;
    }
  }
  return $result;
}
//*/

$prices = [30, 58, 32, 41, 35, 36, 54, 44];
$prices = [30, 32, 35, 32, 34, 36, 33, 39, 38, 31, 32, 62, 55, 45, 56, 78, 53, 63, 34, 73, 55,
          47, 83, 59, 43, 68, 53, 63, 54, 66, 78, 68, 87, 33, 59, 30, 89, 31, 45, 33, 54, 65, 78, 44,
          67, 76, 78, 99, 43, 54, 67, 77, 35, 34];
printf("[%s]\n", join(',', $prices));
printf("[%s]\n", join(',', solution($prices)));