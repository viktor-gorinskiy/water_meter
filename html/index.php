<html>
<head>

<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />

            <title>Электронный счетчик воды</title>

<link rel="stylesheet" type="text/css" href="style.css" />
<?php
include_once './scripts/water_SQL.php';
include_once './scripts/serial.php';

$form_hot_water = str_pad($now_hot_water, 8, "0", STR_PAD_LEFT);
settype($form_hot_water, "string");
$cut_form_hot_water_1 = substr($form_hot_water, 0, 2);
$cut_form_hot_water_2 = substr($form_hot_water, 2, -3);
$cut_form_hot_water_3 = substr($form_hot_water, 5, 8);

$form_cold_water = str_pad($now_cold_water, 8, "0", STR_PAD_LEFT);	// дополняем нулюми слева до девяти чисел в строке
settype($form_cold_water, "string");					// Преобразуем в строку, для того, чтоб разделить на разряды и подсветить последние цифры
$cut_form_cold_water_1 = substr($form_cold_water, 0, 2);
$cut_form_cold_water_2 = substr($form_cold_water, 2, -3);
$cut_form_cold_water_3 = substr($form_cold_water, 5, 8);



?>


<link href="examples.css" rel="stylesheet" type="text/css">

<script language="javascript" type="text/javascript" src="scripts/jquery-3.3.1.min.js"></script>
	<script language="javascript" type="text/javascript" src="charts/charts.min.js"></script>
	<link rel='stylesheet' type="text/css" href="charts/charts.min.css"></link>
	<script type="text/javascript">


      


	$(function() {
	
	var all_data = <?php echo json_encode($d2); ?>;
	for (var i=0; i < all_data.length; i++){
		var item = all_data[i];
		var date = new Date(item[0]*1000);
		var date_str = String((date.getMonth() + 1)) + '-' + date.getDay();
		item[0] = date_str;
	}
	window.all_data = all_data;
	data = {labels: [], series: [{data: []}]}
	all_data.forEach(function(item){
		data.labels.push(item[0]);
		data.series[0].data.push(item[1])
	});
	new Chartist.Line('#placeholder', data);

	});
		
		
	


	</script>

</head>

 

<body>
	

            <div id="container">

                        <div id="header">Шапка сайта



                        </div>

 

                        <div id="navigation">Блок навигации

 

                        </div>

 

                        <div id="menu">Меню


            <li><a href="#start">Показания</a></li>
            <li><a href="#settings">Настройки</a></li>
            <li><a href="#help">Помощь в настройке</a></li>

                        </div>

 			<div id="content">
 			Введите начальные значения показаний счетчиков, эти показания будут прибавляться к показаниям электронных счетчиков.
 			
 			<?php
echo "<p><b>Текущие показания электронного счетчика горячей воды: <output name=''>{$clock_hot_water}</output></b></br>";
echo "<p><b>Текущие показания электронного счетчика холодной воды: <output name='test'>{$clock_cold_water}</output></b></br>";
?>

	<form name="form" method="POST" action="scripts/water_insert_sql.php">
		<p>Введите показания счетчика горячей воды:<br>
               <?php 
               echo "<input name=post_hot_water type=text placeholder={$start_hot_water} maxlength='8' onKeyPress ='if ((event.keyCode < 48) || 
										(event.keyCode > 57)) event.returnValue = false;'>"
               ?>
	       
    	<p>Введите показания счетчика холодной воды:<br>
	        <?php
	        echo "<input name='post_cold_water' type='text' placeholder={$start_cold_water} maxlength='8' onKeyPress ='if ((event.keyCode < 48) || 
							(event.keyCode > 57)) event.returnValue = false;'>"
	        ?>
        	<p><input type="submit" value="Отправить"/>
		</form>

            
<p><b>Текущие показания счетчика горячей воды:</b></br>
<div id="chronometer_hot">

  <?php	
	echo "<span id='hot_water'>{$cut_form_hot_water_1}</span>";
	echo "<span>&nbsp</span>";
	echo "<span id='hot_water'>{$cut_form_hot_water_2}</span>";
	echo "<span>[</span>";
	echo "<span id='thousandths'>{$cut_form_hot_water_3}</span>";
	echo "<span>]</span>";
    ?>
</div></br>
<p><b>Текущие показания счетчика холодной воды:</b></br>
  	<div id="chronometer_cold">
  	
    <?php 	
	echo "<span id='cold_water'>{$cut_form_cold_water_1}</span>";
	echo "<span>&nbsp</span>";
	echo "<span id='cold_water'>{$cut_form_cold_water_2}</span>";
	echo "<span>[</span>";
	echo "<span id='thousandths'>{$cut_form_cold_water_3}</span>";
	echo "<span>]</span>";
   ?>
</div>
<p><b>График температуры горячей воды:</b></br>

	<div id="placeholder" style="width:600px;height:300px;"></div>  
     
   <!--  	<div class="demo-container">
	<div id="placeholder" class="demo-placeholder"></div></div>  -->
                        </div>



                        <div id="clear">

 

                        </div>

                       

                        
                        
                        <div id="footer">Подвал сайта

 

                        </div>

            </div>

 

</body>

</html>
