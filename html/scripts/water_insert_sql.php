<?php
require 'connect.php';

$post_cold_water = $_POST['post_cold_water'];
$post_hot_water = $_POST['post_hot_water'];

$start_cold_water = "";
$start_hot_water = "";

$start_results = $db->query('SELECT cold_water,hot_water FROM start_water');
while ($start_row = $start_results->fetchArray()) {
$start_cold_water = $start_row[cold_water];
$start_hot_water = $start_row[hot_water];
}



if (empty($post_cold_water)) {
$post_cold_water = $start_cold_water;
}

if (empty($post_hot_water)) {
$post_hot_water = $start_hot_water;

}

$db->exec("UPDATE start_water SET hot_water = '$post_hot_water', cold_water = '$post_cold_water'");

header("Location: ".$_SERVER['HTTP_REFERER']);
//header("Location: /www/water_clock/index.php");
?>
