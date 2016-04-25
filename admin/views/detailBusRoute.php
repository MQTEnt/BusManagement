<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Thông tin tuyến xe</title>
	<style>
		p{
			font-size: 200%;
		}
	</style>
</head>
<body>
	<div class="col-md-1"></div>
	<div class="col-md-8">
		<h2>Quản lý tuyến xe<small> - Thông tin tuyến xe</small></h2>
		<hr class="colorgraph">
		<?php
		echo "<p><b>Mã tuyến: </b>$busroute_select->busroute_id</p>"; 
		echo "<p><b>Tên tuyến: </b>$busroute_select->busroute_name</p>"; 
		echo "<p><b>Điểm xuất phát: </b>$busroute_select->busroute_start</p>"; 
		echo "<p><b>Điểm cuối: </b>$busroute_select->busroute_final</p>"; 
		echo "<p><b>Giờ xuất phát: </b>$busroute_select->busroute_starttime</p>"; 
		echo "<p><b>Giờ về gara: </b>$busroute_select->busroute_finaltime</p>"; 
		echo "<p><b>Danh sách các điểm dừng: </b></p>";
		foreach ($arraySelectBusStop as $busstop)
		{
			echo '<p>- '.$busstop['name'].'</p>';
		}
		?>
		<br>
		<br>
		<br>
	</div>
</body>
</html>