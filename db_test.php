<?php
function mtime()
{
  $a = explode(" ", microtime());
  return round(((double)$a[1] + (double)$a[0]) * 1000);
}

function timer($testName)
{
  global $t0;
  echo $testName." Time Need ";
  echo mtime() - $t0;
  echo " milliseconds<br>\n";
}

$t0 = mtime();
require "conf/config.php";
include "admin_check.php";

timer("Establish Database Connection");

$t0 = mtime();
$db->query("select * from $goods_t limit 10");

while($db->next_record());
timer("Query 10 simple data");

echo "<br>Press F5 to refresh, test again<br>"
?>