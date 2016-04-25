<html>
<head>
	<meta http-equiv="content-type" content="text/html; charset=utf-8"/>
	<title>Google Map API V3 with markers</title>
	<style type="text/css">
		body { font: normal 10pt Helvetica, Arial; }
		#map { width: 550px; height: 500px; border: 0px; padding: 0px; }
	</style>
	<script src="http://maps.google.com/maps/api/js?v=3&sensor=false" type="text/javascript"></script>
	<script type="text/javascript">
 //Sample code written by August Li
 var icon = new google.maps.MarkerImage("https://www.metrotransit.org/Images/Icons/Bus.gif",
 	new google.maps.Size(32, 32), new google.maps.Point(0, 0),
 	new google.maps.Point(16, 32));
 var center = null;
 var map = null;
 var currentPopup;
 var bounds = new google.maps.LatLngBounds();
 function addMarker(lat, lng, info) {
 	var pt = new google.maps.LatLng(lat, lng);
 	bounds.extend(pt);
 	var marker = new google.maps.Marker({
 		position: pt,
 		icon: icon,
 		map: map
 	});
 	var popup = new google.maps.InfoWindow({
 		content: info,
 		maxWidth: 300
 	});
 	google.maps.event.addListener(marker, "click", function() {
 		if (currentPopup != null) {
 			currentPopup.close();
 			currentPopup = null;
 		}
 		popup.open(map, marker);
 		currentPopup = popup;
 	});
 	google.maps.event.addListener(popup, "closeclick", function() {
 		map.panTo(center);
 		currentPopup = null;
 	});
 }
 function initMap() {
 	map = new google.maps.Map(document.getElementById("map"), {
 		center: new google.maps.LatLng(0, 0),
 		zoom: 15,
 		mapTypeId: google.maps.MapTypeId.ROADMAP,
 		mapTypeControl: false,
 		mapTypeControlOptions: {
 			style: google.maps.MapTypeControlStyle.HORIZONTAL_BAR
 		},
 		navigationControl: true,
 		navigationControlOptions: {
 			style: google.maps.NavigationControlStyle.SMALL
 		}
 	});
 	<?php
 	foreach ($arrayBusStop as $busstop)
 	{
 		$name=$busstop->getBusStopName();
 		$lat=$busstop->getBusStopLat();
 		$lon=$busstop->getBusStopLon();
 		$desc=$busstop->getBusStopDesc().'<br>'.'Tuyến xe đi qua: '.$arrayBusRoute[$busstop->getBusStopId()];
 		echo ("addMarker($lat, $lon,'<b>$name</b><br>$desc');\n");
 	}
 	?>
 	center = bounds.getCenter();
 	map.fitBounds(bounds);

 }
</script>
</head>
<body onload="initMap()" style="margin:0px; border:0px; padding:0px;">
	<div class="col-md-12">
		<div class="col-md-1"></div>
		<div class="col-md-8"> 
			<h2>Quản lý điểm dừng<small> -Danh sách điểm dừng</small></h2>
			<hr class="colorgraph">
		</div>
	</div>
	<div class="col-md-12">
		<div class="col-md-1"></div>
		<div id="map" class="col-md-6"></div>
		<div class="col-md-6">       
			<table class="table table-striped">
				<thead>
					<tr>
						<th>Mã điểm dừng</th>
						<th>Tên điểm dừng</th>
						<th>Mô tả</th>
						<th>Chi tiết</th>
						<th>Cập nhật</th>
						<th>Xóa</th>
					</tr>
				</thead>
				<tbody>
					<?php
					foreach ($arrayBusStop as $busstop)
					{
						echo '<tr>';
						echo '<th>'.$busstop->getBusStopId().'</th>';
						echo '<th>'.$busstop->getBusStopName().'</th>';
						echo '<th>'.$busstop->getBusStopDesc().'</th>';
						echo "<th><a href=admin.php?c=busstop&a=detail&id=".$busstop->getBusStopId().">Chi tiết</a></th>";
						echo "<th><a href=admin.php?c=busstop&a=edit&id=".$busstop->getBusStopId().">Cập nhật</a></th>";
						echo "<th><a href=admin.php?c=busstop&a=delete&id=".$busstop->getBusStopId().">Xóa</a></th>";
						echo '</tr>';
					}
					?>
				</tbody>
			</table>
			<br>
			<br>
			<br>
		</div>
	</div>
</body>
</html>