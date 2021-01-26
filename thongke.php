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
								$cm = "select * from hopdong, sinhvien where YEAR(ngaylap)>= YEAR('".$bd."') and YEAR(ngaylap)<= YEAR('".$kt."') and hopdong.masv=sinhvien.masv";
								$qr = mysqli_query($kn,$cm) or die("không lấy được sinh viên");
								echo"<div  style = 'text-align:center; padding-bottom:10px; color:blue;'><b>KẾT QUẢ THỐNG KÊ</b></div>";	
								echo "<table align='center' id='tbsv'>";
								echo"<tr><td>Mã sinh viên</td><td>Họ tên</td><td>ngày sinh</td><td>Giới tính</td><td>SVNT</td><td>Chi tiết</td></tr>";
								while ($dong = mysqli_fetch_array($qr)) {
									$tong = (int)$tong+1;
									$masv = $dong['masv'];
									echo "<tr><td>".$dong['masv']."</td><td>".$dong['hoten']."</td><td>".$dong['ngaysinh']."</td><td>".$dong['gioitinh']."</td><td>".$dong['svnt']."</td><td><a href='chitietsv.php?ma=$masv'>Chi tiết</a></td></tr>";
								}
								echo "</table>";
								echo "Tổng số sinh viên nội trú: ".$tong;
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