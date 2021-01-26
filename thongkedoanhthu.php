<?php
require 'side.php';
load_header();
load_menuql();
 ?>
 <!DOCTYPE html>
 <html>
 	<head>
	 	<title>Thống kê</title>
	 	<link rel="stylesheet" type="text/css" href="bootstrap/css/bootstrap.css"/>
		<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.1.0/css/all.css" integrity="sha384-lKuwvrZot6UHsBSfcMvOkWwlCMgc0TaWr+30HWe3a4ltaBwTZhyTEggF5tJv8tbt" crossorigin="anonymous">
		<link rel="stylesheet" type="text/css" href="./style/qlsv.css">
 	</head>
 	<body style="background-color: lightblue">
 		<style type="text/css">
 		#tt{
			margin-top: 20px;
		}
		#tt td{
			padding: 10px;
		}
		#tt input.text{
			width: 200px;
			border-radius: 5px;
			border-color:  #e7ebf0;
		}
		#tt input.btn{
				height: 30px;
				padding: 0;
				width: 90px;
				background-color: darkblue;
			}
		#tt td{
			padding: 7px;
			padding-left: 20px;
		}
		.tbphong{
			margin: 5px;
			border-radius: 5px;
			background-color: lightblue;

		}
		.ttdn{
 				border-radius: 5px;
 				background-color: #e7ebf0;
 				margin-bottom: 10px;
 		}
 		.ttdn td{
 			padding: 5px;
 		}

 		</style>
 		<div class="container" style="background-color: white; padding-top: 10px; padding-bottom: 10px;">
 			<div class="row">
	 			<div class="col-sm-3"  style="padding: 0px;">
		 			<nav class="nav flex-column">
					  <a class="nav-link active" href="thongke.php">Thống kê sinh viên</a>
					  <a class="nav-link" href="thongkedoanhthu.php">Thống kê doanh thu<br>điện nước</a>
					</nav>
				</div>
				<div class="col-sm-9">
					<table align="center" id = "tt" style="padding: 20px;">
						<form method="POST">
							<tr>
								<td>
									Thời gian bắt đầu
								</td>
								<td>
									Thời gian kết thúc
								</td>
							</tr>
							<tr>
								<td>
									<input class="text" type="date" name="txtbd">
								</td>
								<td>
									<input class="text" type="date" name="txtkt">
								</td>
								<td>
									<input class="btn btn-primary" type="submit" name="btntk" value="Thống kê" style="margin-left: 0px;">
								</td>
							</tr>
						</form>
					</table>
					<?php
						include('connectionstring.php');
						if(isset($_POST['btntk'])){
							if(empty($_POST['txtbd'])||empty($_POST['txtkt'])){
								echo "<script>alert('Vui lòng nhập đủ thông tin!')</script>";
							}
							else{
								$tong = 0;
								$bd = $_POST['txtbd'];
								$kt = $_POST['txtkt'];
								$cm = "select * from hoadon where YEAR(ngaylap) >= YEAR('".$bd."') and YEAR(ngaylap) <= YEAR('".$kt."') and trangthaithanhtoan = 1";
								$qr = mysqli_query($kn,$cm) or die("không lấy được sinh viên");
								echo"<div  style = 'text-align:center; padding-bottom:10px; color:blue;'><b>KẾT QUẢ THỐNG KÊ</b></div>";
								echo "<table align='center' class='ttdn'>";
								echo"<tr><td>Mã phòng</td><td>Chỉ số điện</td><td>Chỉ số nước</td><td>Tiền điện</td><td>Tiền nước</td><td>Tổng tiền</td><td>Trạng thái</td></tr>";
								while ($dong = mysqli_fetch_array($qr)) {	
									$tong = (float)$tong + (float)($dong['tongtien']);					
									echo "<tr><td>".$dong['maphong']."</td><td>".$dong['sodien']."</td><td>".$dong['sonuoc']."</td><td>".$dong['tiendien']."</td><td>".$dong['tiennuoc']."</td><td>".$dong['tongtien']."</td><td>".$dong['trangthaithanhtoan']."</td></tr>";
								}
								echo "</table>";
								echo "Tổng doanh thu: ".$tong;
							}
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