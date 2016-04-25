<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Danh sách tuyến xe</title>
</head>
<body>
	<div class="col-md-1"></div>
	<div class="col-md-8">
		<h2>Quản lý tuyến xe<small> -Danh sách tuyến xe</small></h2>
		<hr class="colorgraph">
		<table class="table table-striped">
			<thead>
				<tr>
					<th>Mã tuyến xe</th>
					<th>Tên tuyến xe</th>
					<th>Điểm xuất phát</th>
					<th>Điểm cuối</th>
					<th>Giờ xuất phát</th>
					<th>Giờ về gara</th>
					<th>Chi tiết</th>
					<th>Cập nhật</th>
					<th>Xóa</th>
				</tr>
			</thead>
			<tbody>
				<?php
				foreach ($arrayBusRoute as $busroute)
				{
					echo '<tr>';
					echo '<th>'.$busroute->busroute_id.'</th>';
					echo '<th>'.$busroute->busroute_name.'</th>';
					echo '<th>'.$busroute->busroute_start.'</th>';
					echo '<th>'.$busroute->busroute_final.'</th>';
					echo '<th>'.$busroute->busroute_starttime.'</th>';
					echo '<th>'.$busroute->busroute_finaltime.'</th>';
					echo "<th><a href=admin.php?c=busroute&a=detail&id=".$busroute->busroute_id.">Chi tiết</a></th>";
					echo "<th><a href=admin.php?c=busroute&a=edit&id=".$busroute->busroute_id.">Cập nhật</a></th>";
					echo "<th><a href=admin.php?c=busroute&a=delete&id=".$busroute->busroute_id.">Xóa</a></th>";
					echo '</tr>';
				}
				?>
			</tbody>
		</table>
		<br>
		<br>
		<br>
	</div>
</body>
</html>