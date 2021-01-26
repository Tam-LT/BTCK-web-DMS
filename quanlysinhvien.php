<?php
require 'side.php';
load_header();
load_menuql();
 ?>
 <!DOCTYPE html>
 <html>
 	<head>
	 	<title>Quản lý sinh viên</title>
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
					  <a class="nav-link active" href="quanlysinhvien.php">Tìm kiếm sinh viên</a>
					  <a class="nav-link" href="xemthannhan.php">Quản lý thân nhân</a>
					</nav>
				</div>
				<div class="col-sm-9" >
					<table align="center" id = "tt" style="padding: 20px;">
						<form method="POST">
							<tr>
								<td>
									<input class="text" type="text" name="txtsv" placeholder="Nhập tên sinh viên">
								</td>
								<td>
									<input class="btn btn-primary" type="submit" name="btntk" value="Tìm kiếm">
								</td>
								<td>
									<input class="btn btn-primary" type="submit" name="btndssv" value="Danh sách" style="margin-left: 0px;">
								</td>
							</tr>
						</form>
					</table>
					<?php
						include('connectionstring.php');
						if(isset($_POST['btntk'])){
							if(empty($_POST['txtsv'])){
								echo "<script>alert('Vui lòng nhập tên sinh viên cần tìm!')</script>";
							}
							else{
								$ten = $_POST['txtsv'];
								$cm = "select * from sinhvien where hoten like '%".$ten."%'";
								$qr = mysqli_query($kn,$cm) or die("không lấy được sinh viên");
								echo"<div  style = 'text-align:center; padding-bottom:10px; color:blue;'><b>KẾT QUẢ TÌM KIẾM</b></div>";	
								echo "<table align='center' id='tbsv'>";
								echo"<tr><td>Mã sinh viên</td><td>Họ tên</td><td>ngày sinh</td><td>Giới tính</td><td>SVNT</td><td>Chi tiết</td></tr>";
								while ($dong = mysqli_fetch_array($qr)) {
									$masv = $dong['masv'];
									echo "<tr><td>".$dong['masv']."</td><td>".$dong['hoten']."</td><td>".$dong['ngaysinh']."</td><td>".$dong['gioitinh']."</td><td>".$dong['svnt']."</td><td><a href='chitietsv.php?ma=$masv'>Chi tiết</a></td></tr>";
								}
								echo "</table>";
							}
						}
						//if(isset($_POST['btndssv'])){
								$sdttrang = 5;
								if(isset($_GET['trang'])){
									$page = $_GET['trang'];
								}
								else{
									$page = 0;
								}
								$lenhdem="select * from sinhvien";
								$kqdd = mysqli_query($kn,$lenhdem) or die ("khong dem duoc");
								$sodong = mysqli_num_rows($kqdd);
								$sotrangdl = $sodong/$sdttrang;
								$vtbd = $page * $sdttrang;
								$lenhpt = "select * from sinhvien limit {$vtbd},{$sdttrang}";
								$kqpt = mysqli_query($kn, $lenhpt)or die("thuc hien phan trang khong duoc");
								echo"<div  style = 'text-align:center; padding-bottom:10px; color:blue;'><b>DANH SÁCH SINH VIÊN</b></div>";	
								echo "<table align='center' id='tbsv'>";
								echo"<tr><td>Mã sinh viên</td><td>Họ tên</td><td>ngày sinh</td><td>Giới tính</td><td>SVNT</td><td>Chi tiết</td></tr>";
								while ($dong = mysqli_fetch_array($kqpt)) {
									$masv = $dong['masv'];
									echo "<tr><td>".$dong['masv']."</td><td>".$dong['hoten']."</td><td>".$dong['ngaysinh']."</td><td>".$dong['gioitinh']."</td><td>".$dong['svnt']."</td><td><a href='chitietsv.php?ma=$masv'>Chi tiết</a></td></tr>";
								}
								echo "</table>";
								for($i=0; $i<$sotrangdl; $i++)
									echo "<a href = 'quanlysinhvien.php?trang=$i' style='margin-left:30px; margin-right:-25px;'>>>$i</a>";
						//}

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