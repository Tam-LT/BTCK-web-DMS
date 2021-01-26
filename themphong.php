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
 		#tbdn{
 				border-radius: 5px;
 				background-color: lightblue;
 				margin-bottom: 20px;
 			}
 			#tbdn select{
 				border-radius: 5px;
 				border-color: #e7ebf0;
 			}
 			#tbdn td{
 				padding: 5px;
 			}
 			input.text{
 				border-radius: 5px;
 				border-color: #e7ebf0;
 			}
 			input.btn{
			height: 30px;
			padding: 0;
			width: 70px;
			background-color: darkblue;
			float: right;

			}
			#diennuoc{
				text-align: center;
				padding-top: 20px;
				padding-bottom: 10px;
			}
 		</style>
 		<div class="container" style="background-color: white; padding-top: 10px; padding-bottom: 10px;">
 			<div class="row">
	 			<div class="col-sm-3"  style="padding: 0px;">
		 			<nav class="nav flex-column">
					  <a class="nav-link active" href="quanlyphong.php">Tìm kiếm Phòng</a>
					  <a class="nav-link" href="themphong.php">Thêm mới phòng</a>
					</nav>
				</div>
				<div class="col-sm-9">
					<div id="diennuoc">
				  		<b>
				  			NHẬP THÔNG TIN PHÒNG
				  		</b>
				  	</div>
				  	<form method="POST">
				  	<table align="center" id="tbdn">
				  		<tr>
				  			<td>
				  				<input class="text" type="text" name="txtma" placeholder="Mã phòng">
				  			</td>
				  		</tr>
				  		<tr>
				  			<td>
				  				<input class="text" type="text" name="txtsp" placeholder="Số phòng">
				  			</td>
				  		</tr>
				  		<tr>
				  			<td>
				  				<input class="text" type="text" name="txtkn" placeholder="Khu nhà">
				  			</td>
				  		</tr>
				  		<tr>
				  			<td>
				  				<input class="text" type="text" name="txtsl" placeholder="Số lượng sinh viên">
				  			</td>
				  		</tr>
				  		<tr>
				  			<td>
				  				<input class="text" type="text" name="txtgt" placeholder="Giá tiền">
				  			</td>
				  		</tr>
				  		<tr>
				  			<td>
				  				<input class="text" type="text" name="txttt" placeholder="Tình trạng phòng">
				  			</td>
				  		</tr>
				  		<tr>
				  			<td>
				  				<input class="text" type="text" name="txtmt" placeholder="Mô tả khác">
				  			</td>
				  		</tr>
				  		<tr>
				  			<td>
				  				<input class="btn btn-primary" type="submit" name="btnthem" value="Thêm">
				  			</td>
				  		</tr>
				  	</table>
				  	</form>
					<?php
						include('connectionstring.php');
						if(isset($_POST['btnthem'])){
							if(empty($_POST['txtma'])||empty($_POST['txtsp'])||empty($_POST['txtkn'])||empty($_POST['txtsl'])||empty($_POST['txtgt'])||empty($_POST['txttt'])||empty($_POST['txtmt'])){
								echo "<script>alert('Vui lòng nhập đầy đủ thông tin!')</script>";
							}
							else{
								$sl = $_POST['txtsl'];
								$gt = $_POST['txtgt'];
								$tt = $_POST['txttt'];
								$mt = $_POST['txtmt'];
								$mp = $_POST['txtma'];
								$sp = $_POST['txtsp'];
								$knha = $_POST['txtkn'];
								$cmkt = "select * from phong where maphong = '".$mp."'";
								$qrkt = mysqli_query($kn,$cmkt)or die("không lấy được dữ liệu");
								if($dong = mysqli_fetch_array($qrkt)){
									echo "<script>alert('Mã phòng đã tồn tại!')</script>";
								}
								else{
									$cm = "insert into phong values('".$mp."','".$sp."','".$knha."','".$sl."','".$gt."','".$tt."','".$mt."')";
									$qr = mysqli_query($kn,$cm) or die("không thêm được phòng");
									echo "<script>alert('Thêm phòng thành công!')</script>";	
								}
								
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