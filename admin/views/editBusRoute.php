<?php 
  if (isset($_POST['Add']))
  {
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
  <title>Cập nhật tuyến xe</title>
</head>
<body>
  <div class="container">
    <div class="row">
      <div class="col-xs-12 col-sm-8 col-md-6 col-sm-offset-2 col-md-offset-3">
        <h2>Quản lý tuyến xe<small> -Cập nhật tuyến xe</small></h2>
        <hr class="colorgraph">
        <div class="form-group">
          <form action="" method="POST">
            <input type="text" name="name" class="form-control input-lg" placeholder="Tên tuyến" tabindex="1" value='<?php echo $busroute_select->busroute_name; ?>'>
            <br>
            <input type="text" name="start" class="form-control input-lg" placeholder="Điểm khởi hành" tabindex="2" value='<?php echo $busroute_select->busroute_start; ?>'>
            <br>
            <input type="text" name="final" class="form-control input-lg" placeholder="Điểm kết thúc" tabindex="3" value='<?php echo $busroute_select->busroute_final; ?>'>
            <br>
            <h4>Thời gian khởi hành:</h4>
            <div class="col-md-2">
              <select name="hours_start">
                <option disabled="disabled" selected="selected">Giờ
                </option>
                <?php
                for ($i=0; $i<24 ; $i++)
                {
                  $hours=(int)$busroute_select->busroute_starttime[0]*10+(int)$busroute_select->busroute_starttime[1];
                  if($i==$hours)
                    echo "<option value='".$i."' selected='selected'>".$i."</option>";
                  else
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
                  $minute=(int)$busroute_select->busroute_starttime[3]*10+(int)$busroute_select->busroute_starttime[4];
                  if($i==$minute)
                    echo "<option value='".$i."' selected='selected'>".$i."</option>";
                  else
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
                  $hours=(int)$busroute_select->busroute_finaltime[0]*10+(int)$busroute_select->busroute_finaltime[1];
                  if($i==$hours)
                    echo "<option value='".$i."' selected='selected'>".$i."</option>";
                  else
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
                  $minute=(int)$busroute_select->busroute_finaltime[3]*10+(int)$busroute_select->busroute_finaltime[4];
                  if($i==$minute)
                    echo "<option value='".$i."' selected='selected'>".$i."</option>";
                  else
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
                $flag=false;
                foreach ($arraySelectBusStop as $selectbusstop)
                {
                  if($busstop->busstop_id==$selectbusstop['id'])
                  {
                    echo "<label><input type='checkbox' name='point[]' value='".$busstop->busstop_id."' checked='checked'>".$busstop->busstop_name."</label>";
                    echo "<br>";
                    $flag=true;
                    break;
                  }
                }
                if($flag==false)
                {
                  echo "<label><input type='checkbox' name='point[]' value='".$busstop->busstop_id."'>".$busstop->busstop_name."</label>";
                  echo "<br>";
                }
              }
              ?>
            </div>
            <br>
            <br>
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