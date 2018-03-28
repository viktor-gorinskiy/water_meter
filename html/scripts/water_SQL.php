<?php
// Файл для выдергивания из базы значений и вывода их на экран
require 'connect.php';

$clock_cold_water = '';
$clock_hot_water = '';
$start_cold_water = '';
$start_hot_water = '';
//$d2[]='';
// Получаем текщие занчения счетчиков из базы данных.
$results = $db->query('SELECT cold_water,hot_water FROM water_clock WHERE id = (SELECT max(id) as maxid from water_clock)');
while ($row = $results->fetchArray()) {
$clock_cold_water = $row[cold_water];
$clock_hot_water = $row[hot_water];
}

// Получаем начальные значения переменных из базы данных.
$start_results = $db->query('SELECT cold_water,hot_water FROM start_water');
while ($start_row = $start_results->fetchArray()) {
$start_cold_water = $start_row[cold_water];
$start_hot_water = $start_row[hot_water];
}


// Сложим начальные значения счетчиков с текщим значением счетчиков для вывода результата на экран.

$now_cold_water = $clock_cold_water + $start_cold_water;
$now_hot_water = $clock_hot_water + $start_hot_water;


$id = '';
$time = '';
$hot_temperature = '';

//select strftime('%s',time) from  temperature_water
//$results_temperature = $db->query('SELECT id,time,hot_temperature FROM temperature_water');
$results_temperature = $db->query("SELECT id,strftime('%s',time),hot_temperature from  temperature_water limit 10");
while ($row_temperature = $results_temperature->fetchArray()) {
$d2[] = array (intval($row_temperature["strftime('%s',time)"]),intval($row_temperature['hot_temperature']));
}
//echo json_encode($d2);

?>

