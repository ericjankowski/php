<?php
include ("Log.php");
include ("../lib/LoggingClass.php");
include ("../lib/DateAndTime.php");

$now = new DateAndTime;
$nexthour = new DateAndTime(time() + 3600);
print_r(array($now, $nexthour));
if($now->before($nexthour)){
	echo "OK\n";
}

?>