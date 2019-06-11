<?php
include "../nextRaiderTime.php";
$next_raidertime = get_next();
echo strcmp(date("Y-m-d", time()), $next_raidertime) == 0;
echo " after 9?";
echo( time() >= strtotime("8:00:00"));
?>