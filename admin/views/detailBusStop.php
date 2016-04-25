<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Thông tin điểm dừng</title>
	<style type="text/css">
		p {font-size: 200%;}
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
 		zoom: 10,
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
 	$name=$busstop_select->busstop_name;
 	$lat=$busstop_select->busstop_lat;
 	$lon=$busstop_select->busstop_lon;
 	$desc=$busstop_select->busstop_desc.'<br>'.'Tuyến xe đi qua: '.$arrayBusRoute;
 	echo ("addMarker($lat, $lon,'<b>$name</b><br>$desc');\n");
  	?>
 	center = bounds.getCenter();
 	map.fitBounds(bounds);

 }
</script>
</head>
<body onload="initMap()" style="margin:0px; border:0px; padding:0px;">
	<div class="col-md-1"></div>
	<div class="col-md-8">
		<h2>Quản lý điểm dừng<small> - Thông tin điểm dừng</small></h2>
		<hr class="colorgraph">
		<?php
		echo "<p><b>Mã điểm dừng: </b>$busstop_select->busstop_id</p>"; 
		echo "<p><b>Tên điểm dừng: </b>$busstop_select->busstop_name</p>"; 
		echo "<p><b>Mô tả: </b>$busstop_select->busstop_desc</p>"; 
		echo "<p><b>Danh sách tuyến xe đi qua: </b>$arrayBusRoute</p>";
		?>
		<div id="map" class="col-md-5"></div>
	</div>
</body>
</html>


