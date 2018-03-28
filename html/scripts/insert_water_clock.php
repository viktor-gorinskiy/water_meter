<?php
require 'connect.php';
require 'serial.php';

$db->exec("INSERT INTO water_clock (hot_water,cold_water) VALUES ('$hot_water', '$cold_water')");
//echo 'hot-', $hot_water, " / ";
//echo 'cold-', $cold_water;
?>

