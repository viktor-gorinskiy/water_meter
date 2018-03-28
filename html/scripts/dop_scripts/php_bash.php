<?php
$run = "/www/water_clock/test_bash.sh {$_SERVER['REMOTE_ADDR']} > /dev/null &";
//$run = "/www/water_clock/test_bash.sh > /dev/null &";
//exec('/www/water_clock/test_bash.sh > /dev/null &');
exec($run);
?>
