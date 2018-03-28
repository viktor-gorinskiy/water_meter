<?php
require 'connect.php';
require 'serial.php';
$db->exec("INSERT INTO temperature_water (hot_temperature,cold_temperature) VALUES ('$hot_temperature', '0')");
//echo $hot_temperature;
?>

