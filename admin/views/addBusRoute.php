<?php 
  if (isset($_POST['Add']))
  {
    if(!is_numeric($_POST['id']))
    {
      echo "<center><h2>Mã tuyến xe không bao gồm chữ cái, mời nhập lại<h2></center>";
    }
    if($_POST['name']=="" || $_POST['start']=="" ||$_POST['final']=="")
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
</head>
<body>
  <div class="container">
    <div class="row">
      <div class="col-xs-12 col-sm-8 col-md-6 col-sm-offset-2 col-md-offset-3">
        <h2>Quản lý tuyến xe<small> -Thêm mới tuyến xe</small></h2>
        <hr class="colorgraph">
        <div class="form-group">
          <form action="" method="POST">
            <input type="text" name="id" class="form-control input-lg" placeholder="Mã tuyến" tabindex="1">
            <br>
            <input type="text" name="name" class="form-control input-lg" placeholder="Tên tuyến" tabindex="2">
            <br>
            <input type="text" name="start" class="form-control input-lg" placeholder="Điểm khởi hành" tabindex="3">
            <br>
            <input type="text" name="final" class="form-control input-lg" placeholder="Điểm kết thúc" tabindex="4">
            <br>
            <h4>Thời gian khởi hành:</h4>
            <div class="col-md-2">
              <select name="hours_start">
                <option disabled="disabled" selected="selected">Giờ
                </option>
                <?php
                for ($i=0; $i<24 ; $i++)
                {
                  echo "<option value='".$i."''>".$i."</option>";
                } 
                ?>
              </select>
            </div>
            <div class="col-md-2">
              <select name="minute_start">
                <option disabled="disabled" selected="selected">Phút
                </option>
                <?php
                for ($i=0; $i<60 ; $i++)
                {
                  echo "<option value='".$i."''>".$i."</option>";
                } 
                ?>
              </select>
            </div>
            <br>
            <h4>Thời gian kết thúc:</h4>
            <div class="col-md-2">
              <select name="hours_final">
                <option disabled="disabled" selected="selected">Giờ
                </option>
                <?php
                for ($i=0; $i<24 ; $i++)
                {
                  echo "<option value='".$i."''>".$i."</option>";
                } 
                ?>
              </select>
            </div>
            <div class="col-md-2">
              <select name="minute_final">
                <option disabled="disabled" selected="selected">Phút
                </option>
                <?php
                for ($i=0; $i<60 ; $i++)
                {
                  echo "<option value='".$i."''>".$i."</option>";
                } 
                ?>
              </select>
            </div>
            <br>
            <h4>Danh sách điểm dừng:</h4>
            <div class="checkbox">
              <?php
              foreach ($arrayBusStop as $busstop)
              {
                 echo "<label><input type='checkbox' name='point[]' value='".$busstop->busstop_id."'>".$busstop->busstop_name."</label>";
                 echo "<br>";
              }
              ?>
            </div>
            <br>
            <br>
            <br>
            <div class="col-xs-12 col-md-6"><input type="submit" name="Add" value="Thêm" class="btn btn-primary btn-block btn-lg" tabindex="5"></div>
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