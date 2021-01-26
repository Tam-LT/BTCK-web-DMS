<?php
require 'side.php';
load_header();
load_menuql();
 ?>
 <!DOCTYPE html>
 <html>
 	<head>
	 	<title>Lập danh sách điện nước</title>
	 	<link rel="stylesheet" type="text/css" href="bootstrap/css/bootstrap.css"/>
		<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.1.0/css/all.css" integrity="sha384-lKuwvrZot6UHsBSfcMvOkWwlCMgc0TaWr+30HWe3a4ltaBwTZhyTEggF5tJv8tbt" crossorigin="anonymous">
		<link rel="stylesheet" type="text/css" href="./style/qlsv.css">
 	</head>
 	<body style="background-color: lightblue">
 		<style type="text/css">
 			#dn{
 				border-radius: 5px;

 			}
 			#dn td{ 
 			padding-right: 20px;	
 			padding-bottom: 50px;			
 			}
 			#dn input{
 				border-radius: 5px;
 				border-color: #e7ebf0;
 			}
 			.ldsdn{
 				border-radius: 5px;
 				background-color: #e7ebf0;
 			}
 			.ldsdn td{
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
					<table align="center" id="dn" style="padding: 20px;margin-top: 20px;">
						<form method="POST">
							<tr>
								<td>
									<input type="date" name="txtngay">
								</td>	
								<td>
									<input type="submit" name="btnlap" value="Lập" style="background-color: darkblue;color: white;">
								</td>				
							</tr>
						</form>
					</table>
					<?php
						include('connectionstring.php');
						if(isset($_POST['btnlap'])){
							$cmgd = "SELECT * FROM giadien ORDER BY magd DESC LIMIT 1";
							$qrgd = mysqli_query($kn,$cmgd) or die('không lấy được giá điện');
							$donggd = mysqli_fetch_array($qrgd);
							$gd = $donggd['giadien'];
							$idgd = $donggd['magd'];
							$cmgn = "SELECT * FROM gianuoc ORDER BY magn DESC LIMIT 1";
							$qrgn = mysqli_query($kn,$cmgn) or die('không lấy được giá điện');
							$donggn = mysqli_fetch_array($qrgn);
							$gn = $donggn['gianuoc'];
							$idgn = $donggn['magn'];
							$maql = $_SESSION['user'];
							$thang = date("m");
							$nam = date("Y");
							if(empty($_POST['txtngay'])){
								echo"<div  style = 'text-align:center; padding-bottom:10px; color:blue;'><b>DANH SÁCH ĐIỆN NƯỚC</b></div>";			
								$cm = "select * from diennuoc where YEAR(ngayghiso) = '".$nam."' and MONTH(ngayghiso) = '".$thang."'";
								$qr = mysqli_query($kn,$cm) or die("không lấy được dữ liệu");
								echo "<table align='center' class = 'ldsdn'>";
								echo"<tr><td>Mã phòng</td><td>Chỉ số điện</td><td>Chỉ số nước</td><td>Tiền điện</td><td>Tiền nước</td><td>Tổng tiền</td></tr>";
								while($dong = mysqli_fetch_array($qr)){
									$sdd = $dong['chisodiendau'];
									$sdc = $dong['chisodiencuoi'];
									$snd = $dong['chisonuocdau'];
									$snc = $dong['chisonuoccuoi'];
									$sd = (int)$sdc-(int)$sdd;
									$sn = (int)$snc-(int)$snd;
									$td = (int)$sd*(int)$gd;
									$tn = (int)$sn*(int)$gn;
									$tt = (int)$td+(int)$tn;
									$mp = $dong['maphong'];
									echo "<tr><td>".$mp."</td><td>".$sd."</td><td>".$sn."</td><td>".$td."</td><td>".$tn."</td><td>".$tt."</td></tr>";
									$cmkthd = "select * from hoadon where maphong = '".$mp."'and YEAR(ngaylap)='".$nam."' and MONTH(ngaylap) = '".$thang."'";
									$qrkthd =  mysqli_query($kn,$cmkthd) or die("không lấy được hóa đơn");
									if($dong = mysqli_fetch_array($qrkthd)){
										$cmhd = "update hoadon set maphong = '".$mp."',maql ='".$maql."', magd = '".$idgd."', magn = '".$idgn."', sodien = '".$sd."', sonuoc = '".$sn."', tiendien = '".$td."', tiennuoc = '".$tn."', tongtien = '".$tt."', ngaylap = '".date('Y/m/d')."' where maphong = '".$mp."' and YEAR(ngaylap)='".$nam."' and MONTH(ngaylap) = '".$thang."'";
										$qrhd = mysqli_query($kn,$cmhd) or die("không cập nhật được hóa đơn");
									}
									else{
										$cmhd = "insert into hoadon values('','".$mp."','".$maql."','".$idgd."','".$idgn."','".$sd."','".$sn."','".$td."','".$tn."','".$tt."','".date('Y/m/d')."','')";
										$qrhd = mysqli_query($kn,$cmhd) or die("không lập được hóa đơn");
									}
									
								}
								echo "</table>";
							}
							else{
								$date = $_POST['txtngay'];
								$cm = "select * from diennuoc where YEAR(ngayghiso) = YEAR('".$date."') and MONTH(ngayghiso)=MONTH('".$date."')";
								$qr = mysqli_query($kn,$cm) or die("không lấy được dữ liệu");
								echo"<div  style = 'text-align:center; padding-bottom:10px; color:blue;'><b>DANH SÁCH ĐIỆN NƯỚC</b></div>";
								echo "<table align='center' class = 'ldsdn'>";
								echo"<tr><td>Mã phòng</td><td>Chỉ số điện</td><td>Chỉ số nước</td><td>Tiền điện</td><td>Tiền nước</td><td>Tổng tiền</td></tr>";
								while($dong = mysqli_fetch_array($qr)){
									$sdd = $dong['chisodiendau'];
									$sdc = $dong['chisodiencuoi'];
									$snd = $dong['chisonuocdau'];
									$snc = $dong['chisonuoccuoi'];
									$sd = (int)$sdc-(int)$sdd;
									$sn = (int)$snc-(int)$snd;
									$td = (int)$sd*(int)$gd;
									$tn = (int)$sn*(int)$gn;
									$tt = (int)$td+(int)$tn;
									$mp = $dong['maphong'];
									echo "<tr><td>".$mp."</td><td>".$sd."</td><td>".$sn."</td><td>".$td."</td><td>".$tn."</td><td>".$tt."</td></tr>";
									$cmkthd = "select * from hoadon where maphong = '".$mp."'and YEAR(ngaylap)='".$nam."' and MONTH(ngaylap) = '".$thang."'";
									$qrkthd =  mysqli_query($kn,$cmkthd) or die("không lấy được hóa đơn");
									if($dong = mysqli_fetch_array($qrkthd)){
										$cmhd = "update hoadon set maphong = '".$mp."',maql ='".$maql."', magd = '".$idgd."', magn = '".$idgn."', sodien = '".$sd."', sonuoc = '".$sn."', tiendien = '".$td."', tiennuoc = '".$tn."', tongtien = '".$tt."', ngaylap = '".date('Y/m/d')."' where maphong = '".$mp."' and YEAR(ngaylap)='".$nam."' and MONTH(ngaylap) = '".$thang."'";
										$qrhd = mysqli_query($kn,$cmhd) or die("không cập nhật được hóa đơn");
									}
									else{
										$cmhd = "insert into hoadon values('','".$mp."','".$maql."','".$idgd."','".$idgn."','".$sd."','".$sn."','".$td."','".$tn."','".$tt."','".date('Y/m/d')."','')";
										$qrhd = mysqli_query($kn,$cmhd) or die("không lập được hóa đơn");
									}

								}
								echo "</table>";
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