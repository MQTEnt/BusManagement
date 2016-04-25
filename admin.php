<?php
//Dinh nghia duong dan he thong
define('PATH_SYSTEM',__DIR__.'/system');
define('PATH_APPLICATION', __DIR__.'/admin');
define('PATH_ROOT',__DIR__);
//Lay thong so cau hinh
include_once(PATH_SYSTEM.'/config/config.php');
//Connect database
$conn = mysqli_connect(DB_HOST,DB_USER,DB_PASSWORD,DB_NAME);
//Danh sach cac tham so co 2 phan
$segment = array(
    'controller' => "",
    'action' => array()
);
?>
<html lang="en">
<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>Quản lý xe bus</title>
	<!-- Bootstrap -->
	<link href="/stylesheets/bootstrap.min.css" rel="stylesheet">
</head>
<body>
	<nav class="navbar navbar-default">
		<div class="container-fluid">
			<!-- Brand and toggle get grouped for better mobile display -->
			<div class="navbar-header">
				<button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1" aria-expanded="false">
					<span class="sr-only">Toggle navigation</span>
					<span class="icon-bar"></span>
					<span class="icon-bar"></span>
					<span class="icon-bar"></span>
				</button>
				<a class="navbar-brand" href="#">Trang chủ</a>
			</div>

			<!-- Collect the nav links, forms, and other content for toggling -->
			<div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
				<ul class="nav navbar-nav">
					<li class="dropdown">
						<a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">Q.Lý tuyến xe<span class="caret"></span></a>
						<ul class="dropdown-menu">
							<li><a href="/admin.php?c=busroute&a=get">Danh sách tuyến xe</a></li>
							<li role="separator" class="divider"></li>
							<li><a href="/admin.php?c=busroute&a=insert">Thêm mới tuyến xe</a></li>
						</ul>
					</li>
					<li class="dropdown">
						<a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">Q.Lý điểm dừng<span class="caret"></span></a>
						<ul class="dropdown-menu">
							<li><a href="/admin.php?c=busstop&a=get">Danh sách điểm dừng</a></li>
							<li role="separator" class="divider"></li>
							<li><a href="/admin.php?c=busstop&a=insert">Thêm mới điểm dừng</a></li>
						</ul>
					</li>
					<li><a href="#">Tìm đường</a></li>
				</ul>
				<form class="navbar-form navbar-left" role="search">
					<div class="form-group">
						<input type="text" class="form-control" placeholder="Search">
					</div>
					<button type="submit" class="btn btn-default">Search</button>
				</form>
			</div><!-- /.navbar-collapse -->
		</div><!-- /.container-fluid -->
	</nav>
	<!-- main -->
	<div>
		<?php
		//Neu khong truyen Controller thi se truyen controller mac dinh
		
		$segment['controller']= empty($_GET['c']) ? CONTROLLER_DEFAULT : $_GET['c'];
		$segment['action']= empty($_GET['a']) ? ACTION_DEFAULT : $_GET['a'];
		include_once(PATH_SYSTEM.'/core/Controller.php');
		$controller = new Controller();
		$controller->load($segment['controller'],$segment['action']);
		
		//require("addpoint.php");
		?>
	</div>
	<br>
	<br>
	<br>
	<!-- footer-->
	<div style="position: fixed; bottom: 0; width: 100%; background:#E7E7E7;">
        <center>&copy; Trần Mạnh Quỳnh - A24126</center>
        <center>Thang Long University</center>
    </div>
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
	<!-- Include all compiled plugins (below), or include individual files as needed -->
	<script src="javascripts/bootstrap.min.js"></script>
</body>
</html>

