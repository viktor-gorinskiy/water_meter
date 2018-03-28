<?php
include_once 'water_SQL.php';


$now_hot_water = str_pad($now_hot_water, 9, "0", STR_PAD_LEFT);
settype($now_hot_water, "string");
$cut_now_hot_water_1 = substr($now_hot_water, 0, 3);
$cut_now_hot_water_2 = substr($now_hot_water, 3, -3);
$cut_now_hot_water_3 = substr($now_hot_water, 6, 9);

$now_cold_water = str_pad($now_cold_water, 9, "0", STR_PAD_LEFT);	// дополняем нулюми слева до девяти чисел в строке
settype($now_cold_water, "string");					// Преобразуем в строку, для того, чтоб разделить на разряды и подсветить последние цифры
$cut_now_cold_water_1 = substr($now_cold_water, 0, 3);
$cut_now_cold_water_2 = substr($now_cold_water, 3, -3);
$cut_now_cold_water_3 = substr($now_cold_water, 6, 9);
?>

<html>
<link href="counter_water.css" rel="stylesheet" type="text/css">
<body>
  	<div id="chronometer">
  <?php	
	echo "<span>{$cut_now_hot_water_1}</span>";
	echo "<span>&nbsp</span>";
	echo "<span>{$cut_now_hot_water_2}</span>";
	echo "<span>&nbsp</span>";
	echo "<span id='thousandths'>{$cut_now_hot_water_3}</span>";
    ?>
</div></br>

  	<div id="chronometer">
    <?php	
	echo "<span>{$cut_now_cold_water_1}</span>";
	echo "<span>&nbsp</span>";
	echo "<span>{$cut_now_cold_water_2}</span>";
	echo "<span>/</span>";
	echo "<span id='thousandths'>{$cut_now_cold_water_3}</span>";
    ?>
</div>

</body>
</html>
