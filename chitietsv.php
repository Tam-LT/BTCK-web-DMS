<?php
require 'side.php';
load_header();
load_menuql();
 ?>
 <!DOCTYPE html>
 <html>
 	<head>
	 	<title>Quản lý điện nước</title>
	 	<link rel="stylesheet" type="text/css" href="bootstrap/css/bootstrap.css"/>
		<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.1.0/css/all.css" integrity="sha384-lKuwvrZot6UHsBSfcMvOkWwlCMgc0TaWr+30HWe3a4ltaBwTZhyTEggF5tJv8tbt" crossorigin="anonymous">
		<link rel="stylesheet" type="text/css" href="./style/qlsv.css">
 	</head>
 	<body style="background-color: lightblue">
 		<style type="text/css">
 			#sinhvien{
				text-align: center;
				padding-top: 20px;
				padding-bottom: 10px;
			}
			#tbsv{
			border-radius: 10px;
			background-color:#e7ebf0;
			margin-bottom: 15px;
			}
			#tbsv td{
			padding: 7px;
			}
 		</style>
 		<div class="container" style="background-color: white; padding-top: 10px; padding-bottom: 10px;">
 			<div class="row">
	 			<div class="col-sm-3"  style="padding: 0px;">
		 			<nav class="nav flex-column">
					  <a class="nav-link active" href="quanlysinhvien.php">Tìm kiếm sinh viên</a>
					  <a class="nav-link" href="xemthannhan.php">Quản lý thân nhân</a>
					</nav>
				</div>
				<div class="col-sm-9">
					<div id="sinhvien">
				  		<b>
				  			CHI TIẾT SINH VIÊN
				  		</b>
				  	</div>
					<?php
						$masv = $_GET['ma'];
						include('connectionstring.php');
						$cm = "select * from sinhvien where masv = '".$masv."'";
						$qr = mysqli_query($kn,$cm) or die("không lấy được sinh viên");
						if($dong = mysqli_fetch_array($qr)){
							echo "<table align='center' id='tbsv'>";
							echo "<tr><td>Mã sinh viên</td><td>".$dong['masv']."</td></tr>";
							echo "<tr><td>Họ tên</td><td>".$dong['hoten']."</td></tr>";
							echo "<tr><td>Địa chỉ</td><td>".$dong['gioitinh']."</td></tr>";
							echo "<tr><td>Quê quán</td><td>".$dong['ngaysinh']."</td></tr>";
							echo "<tr><td>SĐT</td><td>".$dong['ngaysinh']."</td></tr>";
							echo "<tr><td>CMND</td><td>".$dong['ngaysinh']."</td></tr>";
							echo "<tr><td>Lớp</td><td>".$dong['ngaysinh']."</td></tr>";
							echo "<tr><td>Khoa</td><td>".$dong['ngaysinh']."</td></tr>";
							echo "<tr><td>SVNT</td><td>".$dong['ngaysinh']."</td></tr>";
							echo "</table>";
						}

					
					?>
				</div>	
		</div>
		
 	</div>
 		<script type="text/javascript" src="bootstrap/js/bootstrap.js"></script>
		<script type="text/javascript" src="./javascript/jquery-3.3.1.min.js"></script>
		<script type="text/javascript" src="./javascript/popper.min.js"></script>
 	</body>
 </html>
 <?php
  load_footer();
 ?>