<?php
require 'side.php';
load_header();
load_menuql();
 ?>
 <!DOCTYPE html>
 <html>
 	<head>
	 	<title>Cập nhật giá điện nước</title>
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
		select.text{
			width: 200px;
			border-radius: 5px;
			border-color:  #e7ebf0;
		}
	</style>
 		<div class="container" style="background-color: white; padding-top: 10px; padding-bottom: 10px;">
 			<div class="row">
	 			<div class="col-sm-3"  style="padding: 0px;">
		 			<nav class="nav flex-column">
					  <a class="nav-link active" href="quanlydiennuoc.php">Thêm số điện nước</a>
					  <a class="nav-link" href="lapdanhsachdn.php">Lập danh sách điện<br>nước</a>
					  <a class="nav-link" href="thanhtoandiennuoc.php">Thanh toán điện nước</a>
					  <a class="nav-link" href="capnhatgiadiennuoc.php">Cập nhật đơn giá<br> điện nước</a>
					</nav>
				</div>
				<div class="col-sm-9">
					<form method="POST">
						<table id = "tt"align="center">
							<tr>
								<td>
									<input class="text" type="text" name="txtgd" placeholder="Nhập giá điện">
								</td>
								<td>
									<input class="btn btn-primary" type="submit" name="btngd" value="Cập nhật">
								</td>
							</tr>
							<tr>
								<td>
									<input class="text" type="text" name="txtgn" placeholder="Nhập giá nước">
								</td>
								<td>
									<input class="btn btn-primary" type="submit" name="btngn" value="Cập nhật">
								</td>
							</tr>
						</table>
					</form>	
					<?php
						include('connectionstring.php');
						if(isset($_POST['btngd'])){
							if(empty($_POST['txtgd'])){
								echo "<script>alert('Vui lòng nhập giá điện!')</script>";
							}
							else{
								$cm = "insert into giadien(giadien) values('".$_POST['txtgd']."')";
								$qr = mysqli_query($kn,$cm);
								echo "<script>alert('Thêm giá điện thành công!')</script>";
							}
						}
						if(isset($_POST['btngn'])){
							if(empty($_POST['txtgn'])){
								echo "<script>alert('Vui lòng nhập giá nước!')</script>";
							}
							else{
								$cm = "insert into gianuoc(gianuoc) values('".$_POST['txtgn']."')";
								$qr = mysqli_query($kn,$cm);
								echo "<script>alert('Thêm giá nước thành công!')</script>";
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