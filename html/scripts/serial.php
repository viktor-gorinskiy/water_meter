<?php

$string;
$hot_temperature;
$hot_water;
$cold_water;


function read_serial_port()
{

global $arr;

	$serial_port = '/dev/ttyUSB0';
	
	if (file_exists($serial_port)) {	
		
		$fd = dio_open($serial_port, O_RDWR | O_NOCTTY | O_NONBLOCK);
		
		if ($fd) {
			dio_fcntl($fd, F_SETFL, O_SYNC);
			dio_tcsetattr($fd, array('baud' => 115200, 'bits' => 8,'stop'  => 1, 'parity' => 0));
			sleep(1);

			$data = dio_read($fd);
			$string = substr(strstr($data, '{'), 0, strpos($data, '}')+1);
		
			dio_close($fd);

			$string = substr(strstr($data, '{'), 0, strpos($data, '}')+1);
			$arr = (array)json_decode($string, true);

			
		

			}
		else {
		echo "Не хватает прав для чтения $serial_port</br>";
	}
	}
	else {
		echo "Не найден порт $serial_port</br>";
	}
}


read_serial_port();

while (($arr['temperature'] == "") and ($arr['counter_1'] == "") and ($arr['counter_2'] == ""))
{
read_serial_port();
}
$hot_temperature = $arr['temperature'];
$hot_water = $arr['counter_1'];
$cold_water = $arr['counter_2'];

echo $hot_temperature;

?>

