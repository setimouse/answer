<?php
/*
function da($line) {
  print('[' . join("\t", $line) . "]");
  print "\n";
}

function solution($grid) {
  // f(x, y) = min(f(x - 1, y), f(x, y - 1))
  $line = [$grid[0][0]];
  for ($i = 1; $i < count($grid[0]); $i++) {
    $line[$i] = $line[$i - 1] + $grid[0][$i];
  }
  da($line);
  for ($y = 1; $y < count($grid); $y++) {
    $line[0] = $line[0] + $grid[$y][0];
    for ($i = 1; $i < count($grid[$y]); $i++) {
      $line[$i] = min($line[$i - 1], $line[$i]) + $grid[$y][$i];
    }
    da($line);
  }
  return $line[count($line) - 1];
}
/*/
function solution($grid) {
  for ($i = 1; $i < count($grid[0]); $i++) {
    $grid[0][$i] += $grid[0][$i - 1];
  }
  for ($y = 1; $y < count($grid); $y++) {
    $grid[$y][0] = $grid[$y - 1][0] + $grid[$y][0];
    for ($i = 1; $i < count($grid[$y]); $i++) {
      $grid[$y][$i] = min($grid[$y - 1][$i], $grid[$y][$i - 1]) + $grid[$y][$i];
    }
  }
  return $grid[count($grid) - 1][count($grid[0]) - 1];
}
//*/

/*
$grid = [
  [1,3,1],  // [1,4,5]
  [1,5,1],  // [2,7,6]
  [4,2,1],  // [6,8,7]
];
/*/
$grid = [
  [1,15,13,15,26,37,12,54,23,44],
  [43,26,43,64,22,71,12,45,64,24],
  [22,41,37,62,44,35,32,57,23,23],
  [17,52,38,72,29,32,32,43,54,34],
  [14,35,53,27,22,32,23,55,24,87],
  [62,23,31,42,53,14,35,55,23,32],
  [22,43,19,42,79,34,80,34,69,43],
  [23,33,57,23,84,23,67,34,56,92],
  [83,23,44,56,34,54,74,58,43,34],
  [35,69,23,87,23,64,55,28,24,79],
  [34,92,34,68,23,56,82,27,24,35],
  [67,23,68,23,94,28,33,47,42,85]
];
//*/
print(solution($grid));