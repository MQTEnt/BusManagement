<?php 
  if (isset($_POST['Edit']))
  {
    if($_POST['name']=="" || $_POST['desc']=="" ||$_POST['lati']=="")
    {
      echo "<center><h2>Bạn nhập thiếu thông tin, mời nhập lại</h2></center>";
    }
  }
?>
<html>
<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Cập nhật điểm dừng</title>
  <!-- Google Map -->
  <script src="http://maps.googleapis.com/maps/api/js"></script>
  <script>
    var map; //Ban do
    var defaultPosition=new google.maps.LatLng(<?php echo "'".$busstop_select->busstop_lat."'"; ?>,<?php echo "'".$busstop_select->busstop_lon."'"; ?>); //Vi tri mac dinh
    var mapProp = {
        center:defaultPosition,
        zoom:15,
        mapTypeId:google.maps.MapTypeId.ROADMAP
      }; //Khoi tao thong tin ban do
      function initialize()
      {
        //Khoi tao ban do
        map = new google.maps.Map(document.getElementById("googleMap"),mapProp);
        //Khoi tao lai diem dung cu
        var marker = new google.maps.Marker({
          position: defaultPosition,
        });
        marker.setMap(map);
        //Goi su kien click
        google.maps.event.addListener(map, 'click', function(event) 
        {
          placeMarker(event.latLng);
        });
      }
      //Ham su ly sau moi lan click
      function placeMarker(newPosition)
      {
        //Sau khi co duoc vi tri moi, load lai ban do voi vi tri do
        var mapProp = {
        center:newPosition,
        zoom:15,
        mapTypeId:google.maps.MapTypeId.ROADMAP
        }; //Khoi tao thong tin ban do
        map = new google.maps.Map(document.getElementById("googleMap"),mapProp);
        google.maps.event.addListener(map, 'click', function(event) 
        {
          placeMarker(event.latLng);
        });
        //Sau khi load ban do, gan len ban do vi tri moi
        var marker = new google.maps.Marker({
          position: newPosition,
          map: map,
        }); //Thong tin diem moi tao
        //Gan gia tri lati va long vao input
        document.getElementById("lati").value = newPosition.lat();
        document.getElementById("long").value = newPosition.lng();
      }
      google.maps.event.addDomListener(window, 'load', initialize);
  </script>
</head>
<body>
  <div class="container">
    <div class="row">
      <div class="col-xs-12 col-sm-8 col-md-6 col-sm-offset-2 col-md-offset-3">
        <h2>Quản lý điểm dừng<small> -Cập nhật điểm dừng</small></h2>
        <hr class="colorgraph">
        <div class="form-group">
          <form action="" method="POST">
            <input type="text" name="name" class="form-control input-lg" placeholder="Tên điểm dừng" tabindex="2" value='<?php echo $busstop_select->busstop_name; ?>'>
            <br>
            <textarea class="form-control input-lg" name="desc" placeholder="Mô tả" tabindex="4"><?php echo $busstop_select->busstop_desc; ?></textarea>
            <br>
            <input type="hidden" name="lati" id="lati" class="form-control input-lg" value='<?php echo $busstop_select->busstop_lat; ?>'>
            <input type="hidden" name="long" id="long" class="form-control input-lg" value='<?php echo $busstop_select->busstop_lon; ?>'>
            <div id="googleMap" style="width:550px;height:500px;"></div>
            <br>
            <div class="col-xs-12 col-md-6"><input type="submit" name="Edit" value="Cập nhật" class="btn btn-primary btn-block btn-lg" tabindex="5"></div>
            <div class="col-xs-12 col-md-6"><a href="#" class="btn btn-success btn-block btn-lg">Hủy</a></div>
            <br>
            <br>
            <br>
          </form>        
        </div>
      </div>
    </div>
  </div>
</body>
</html>