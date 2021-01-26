<?php
require 'side.php';
load_header();
load_menuql();
 ?>
 <!DOCTYPE html>
 <html>
 	<head>
	 	<title>Thanh toán điện nước</title>
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
		.ttdn{
 				border-radius: 5px;
 				background-color: #e7ebf0;
 		}
 		.ttdn td{
 			padding: 5px;
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
									<input class="text" type="text" name="txtphong" placeholder="Nhập mã phòng cần tìm">
								</td>
								<td>
									<input class="btn btn-primary" type="submit" name="btntk" value="Tìm kiếm">
								</td>
							</tr>
							<tr>
								<td>
									<input class="text" type="date" name="txtngay">
								</td>
								<td>
									<input class="btn btn-primary" type="submit" name="btndshd" value="Danh sách">
								</td>
							</tr>
							<tr>
								<td>
									<select class="text" name="cbomaphong">
					  					<option value="" selected="selected">--chọn mã phòng--</option>
					  					<?php
					  						include('connectionstring.php');
					  						$cm = "select * from phong";
					  						$qr = mysqli_query($kn,$cm) or die('không lấy được dữ liệu');

					  						while ($row = mysqli_fetch_array($qr)):
					  					?>
					  					<option value="<?php echo htmlspecialchars($row['maphong'])?>"><?php echo htmlspecialchars($row['maphong'])?></option>
					  					<?php
					  						endwhile;
					  					?>		  					
					  				</select>
								</td>
								<td>
									<input class="btn btn-primary" type="submit" name="btntt" value="Thanh toán">
								</td>
							</tr>
						</table>
					</form>	
					<?php
						include('connectionstring.php');
						if(isset($_POST['btndshd'])){
							if(empty($_POST['txtngay'])){
								$cm = "select * from hoadon";
								$qr = mysqli_query($kn,$cm);
								echo"<div  style = 'text-align:center; padding-bottom:10px; color:blue;'><b>DANH SÁCH ĐIỆN NƯỚC</b></div>";	
								echo "<table align='center' class='ttdn'>";
								echo"<tr><td>Mã phòng</td><td>Chỉ số điện</td><td>Chỉ số nước</td><td>Tiền điện</td><td>Tiền nước</td><td>Tổng tiền</td><td>Trạng thái</td></tr>";
								while ($dong = mysqli_fetch_array($qr)) {						
									echo "<tr><td>".$dong['maphong']."</td><td>".$dong['sodien']."</td><td>".$dong['sonuoc']."</td><td>".$dong['tiendien']."</td><td>".$dong['tiennuoc']."</td><td>".$dong['tongtien']."</td><td>".$dong['trangthaithanhtoan']."</td></tr>";
								}
								echo "</table>";
							}
							else{
								$date = $_POST['txtngay'];
								$cm = "select * from hoadon where YEAR(ngaylap) = YEAR('".$date."') and MONTH(ngaylap)=MONTH('".$date."')";
								$qr = mysqli_query($kn,$cm) or die("không lấy được danh sách");
								echo"<div  style = 'text-align:center; padding-bottom:10px; color:blue;'><b>DANH SÁCH ĐIỆN NƯỚC</b></div>";	
								echo "<table align='center' class='ttdn'>";
								echo"<tr><td>Mã phòng</td><td>Chỉ số điện</td><td>Chỉ số nước</td><td>Tiền điện</td><td>Tiền nước</td><td>Tổng tiền</td><td>Trạng thái</td></tr>";
								while ($dong = mysqli_fetch_array($qr)) {						
									echo "<tr><td>".$dong['maphong']."</td><td>".$dong['sodien']."</td><td>".$dong['sonuoc']."</td><td>".$dong['tiendien']."</td><td>".$dong['tiennuoc']."</td><td>".$dong['tongtien']."</td><td>".$dong['trangthaithanhtoan']."</td></tr>";
								}
								echo "</table>";
							}
						}
						if(isset($_POST['btntk'])){
							if (empty($_POST['txtphong'])) {
								echo "<script>alert('vui lòng nhập mã phòng cần tìm!')</script>";
							}
							else{
								if(!empty($_POST['txtngay'])){
									$ma = $_POST['txtphong'];
									$date = $_POST['txtngay'];
									$cm = "select * from hoadon where YEAR(ngaylap) = YEAR('".$date."') and MONTH(ngaylap)=MONTH('".$date."') and maphong = '".$ma."'";
									$qr = mysqli_query($kn,$cm) or die("không lấy được danh sách");
									echo"<div  style = 'text-align:center; padding-bottom:10px; color:blue;'><b>DANH SÁCH ĐIỆN NƯỚC</b></div>";	
									echo "<table align='center' class='ttdn'>";
									echo"<tr><td>Mã phòng</td><td>Chỉ số điện</td><td>Chỉ số nước</td><td>Tiền điện</td><td>Tiền nước</td><td>Tổng tiền</td><td>Trạng thái</td></tr>";
									while ($dong = mysqli_fetch_array($qr)) {						
										echo "<tr><td>".$dong['maphong']."</td><td>".$dong['sodien']."</td><td>".$dong['sonuoc']."</td><td>".$dong['tiendien']."</td><td>".$dong['tiennuoc']."</td><td>".$dong['tongtien']."</td><td>".$dong['trangthaithanhtoan']."</td></tr>";
									}
									echo "</table>";
								}
								else{
									$ma = $_POST['txtphong'];
									$cm = "select * from hoadon where maphong = '".$ma."'";
									$qr = mysqli_query($kn,$cm) or die("không lấy được danh sách");
									echo"<div  style = 'text-align:center; padding-bottom:10px; color:blue;'><b>DANH SÁCH ĐIỆN NƯỚC</b></div>";	
									echo "<table align='center' class='ttdn'>";
									echo"<tr><td>Mã phòng</td><td>Chỉ số điện</td><td>Chỉ số nước</td><td>Tiền điện</td><td>Tiền nước</td><td>Tổng tiền</td><td>Trạng thái</td></tr>";
									while ($dong = mysqli_fetch_array($qr)) {						
										echo "<tr><td>".$dong['maphong']."</td><td>".$dong['sodien']."</td><td>".$dong['sonuoc']."</td><td>".$dong['tiendien']."</td><td>".$dong['tiennuoc']."</td><td>".$dong['tongtien']."</td><td>".$dong['trangthaithanhtoan']."</td></tr>";
									}
									echo "</table>";
								}
							}
						}
						if(isset($_POST['btntt'])){
							if(empty($_POST['cbomaphong'])||empty($_POST['txtngay'])){
								echo "<script>alert('vui lòng chọn đủ thông tin!')</script>";
							}
							else{
								$mp = $_POST['cbomaphong'];
								$date = $_POST['txtngay'];
								$cm = "update hoadon set trangthaithanhtoan = 1 where maphong = '".$mp."'and YEAR(ngaylap) = YEAR('".$date."') and MONTH(ngaylap)=MONTH('".$date."')";
								$qr = mysqli_query($kn,$cm) or die("không thanh toán được");
								echo "<script>alert('Thanh toán thành công!')</script>";
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