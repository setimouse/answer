<?php
function solution($str) {
  // d(i, j) = s[i] == s[j] && d[i+1][j-1], i + 1 <= j - 1
  // d[3,4] = s[3] == s[4], j - i == 1
  // d[3,5] = s[3] == s[5] && d[4,4]
  // d[3,6] = s[3] == s[6] && d[4,5]
  // d[4,5] = s[4] == s[5] && d[3,3]
  $dp = [];
  $len = strlen($str);
  $m = 0; $n = 0;
  for ($i = $len - 1; $i > 0; $i--) {
    for ($j = $i; $j < $len; $j++) {
      $result = intval($str[$i] == $str[$j]);
      if ($j - $i > 1) {
        $result = $result && $dp[serialize([$i + 1, $j - 1])];
      }
      if ($result) {
        if ($j - $i > $n - $m) {
          $m = $i; $n = $j;
        }
      }
      $dp[serialize([$i, $j])] = $result;
    }
  }
  return substr($str, $m, $n - $m + 1);
}

// $str = "daabbae";
$str = "mfdnn323dfhh83dfsinnf23mdji5mmds49mdimf4fmidm4mdinondsn2pldsmooondnsi43nnidsi3ndnfjiemmsmfmfin4nnfinfndim4mmdfmidib4mdilh5m3mfndlfifdfjkdnsnsnin4nmdfmfdmi4nfnddnfnfidni4nkfdb4nnfkdlpnnd83jknds";

print(solution($str));