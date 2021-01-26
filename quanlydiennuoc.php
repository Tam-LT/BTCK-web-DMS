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
					  <a class="nav-link active" href="quanlydiennuoc.php">Thêm số điện nước</a>
					  <a class="nav-link" href="lapdanhsachdn.php">Lập danh sách điện<br>nước</a>
					  <a class="nav-link" href="thanhtoandiennuoc.php">Thanh toán điện nước</a>
					  <a class="nav-link" href="capnhatgiadiennuoc.php">Cập nhật đơn giá<br> điện nước</a>
					</nav>
				</div>
				<div class="col-sm-9">
					<div id="diennuoc">
				  		<b>
				  			NHẬP THÔNG TIN ĐIỆN NƯỚC
				  		</b>
				  	</div>
				  	<form method="POST">
				  	<table align="center" id="tbdn">
				  		<tr>
				  			<td>
				  				<select name="cbomaphong">
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
				  		</tr>
				  		<tr>
				  			<td>
				  				<input class="text" type="text" name="txtsd" placeholder="Chỉ số điện">
				  			</td>
				  		</tr>
				  		<tr>
				  			<td>
				  				<input class="text" type="text" name="txtsn" placeholder="Chỉ số nước">
				  			</td>
				  		</tr>
				  		<tr>
				  			<td>
				  				<input class="btn btn-primary" type="submit" name="btnthem" value="Thêm">
				  			</td>
				  		</tr>
				  	</table>
				  	</form>
						
				</div>	
			</div>
			<?php
				include('connectionstring.php');
				if(isset($_POST['btnthem'])){
					if(empty($_POST['cbomaphong'])||empty($_POST['txtsd'])||empty($_POST['txtsn'])){
						echo "<script>alert('Vui lòng nhập đầy đủ thông tin!')</script>";
					}
					else{
						$mp = $_POST['cbomaphong'];
						$sd = $_POST['txtsd'];
						$sn = $_POST['txtsn'];
						$thang = date('m');
						$nam = date('Y');
						$cm = "select * from diennuoc where maphong = '".$mp."' and YEAR(ngayghiso) = '".$nam."' and MONTH(ngayghiso) = '".$thang."'";
						$qr = mysqli_query($kn,$cm) or die("không lấy được dữ liệu");
						if($dong = mysqli_fetch_array($qr)){
							$lastmonth = mktime(0, 0, 0, date("m")-1, date("d"),   date("Y"));
							$thangtr = date('m', $lastmonth);
							$namtr = date('Y', $lastmonth);
							$cm = "select * from diennuoc where maphong = '".$mp."' and YEAR(ngayghiso) = '".$namtr."' and MONTH(ngayghiso) = '".$thangtr."'";
							$qr = mysqli_query($kn,$cm) or die("không lấy được dữ liệu");
							if($dong1 = mysqli_fetch_array($qr)){
								$snc = $dong1['chisonuoccuoi'];							
								$sdc = $dong1['chisodiencuoi'];
								if($sd<$sdc){
										echo "<script>alert('số điện phải lớn hơn tháng trước!')</script>";
									}
									else{
										if($sn<$snc){
										echo "<script>alert('số nước phải lớn hơn tháng trước!')</script>";
										}
										else{
											$cmuddn = "update diennuoc set chisodiencuoi = '".$sd."', chisonuoccuoi = '".$sn."' where maphong = '".$mp."' and YEAR(ngayghiso) = '".$nam."' and MONTH(ngayghiso) = '".$thang."'";
											$qruddn =  mysqli_query($kn,$cmuddn) or die("không update được điện nước");
											echo "<script>alert('Cập nhật thành công!')</script>";
										}
									}
							}
							else{
								$snc = 0;							
								$sdc = 0;
								if($sd<$sdc){
									echo "<script>alert('số điện phải lớn hơn tháng trước!')</script>";
								}
								else{
									if($sn<$snc){
									echo "<script>alert('số nước phải lớn hơn tháng trước!')</script>";
									}
									else{
										$cmuddn = "update diennuoc set chisodiencuoi = '".$sd."', chisonuoccuoi = '".$sn."' where maphong = '".$mp."' and YEAR(ngayghiso) = '".$nam."' and MONTH(ngayghiso) = '".$thang."'";
										$qruddn =  mysqli_query($kn,$cmuddn) or die("không update được điện nước");
										echo "<script>alert('Cập nhật thành công!')</script>";
									}
								}
							}
							
						}
						else{
							$lastmonth = mktime(0, 0, 0, date("m")-1, date("d"),   date("Y"));
							$thang = date('m', $lastmonth);
							$nam = date('Y', $lastmonth);
							$cm = "select * from diennuoc where maphong = '".$mp."' and YEAR(ngayghiso) = '".$nam."' and MONTH(ngayghiso) = '".$thang."'";
							$qr = mysqli_query($kn,$cm) or die("không lấy được dữ liệu");
							if($dong = mysqli_fetch_array($qr)){
								$snc = $dong['chisonuoccuoi'];
								$sdc = $dong['chisodiencuoi'];
								if($sd<$sdc){
									echo "<script>alert('số điện phải lớn hơn tháng trước!')</script>";
								}
								else{
									if($sn<$snc){
									echo "<script>alert('số nước phải lớn hơn tháng trước!')</script>";
									}
									else{
										$cmtdn = "insert into diennuoc(maphong,chisodiendau,chisodiencuoi,chisonuocdau,chisonuoccuoi,ngayghiso) values('".$mp."', '".$sdc."', '".$sd."', '".$snc."', '".$sn."', '".date('Y/m/d')."')";
										$qrtdn =  mysqli_query($kn,$cmtdn) or die("không thêm được điện nước");
										echo "<script>alert('Thêm thành công!')</script>";
									}
								}
								
							}
							else{
								$cmtdn = "insert into diennuoc(maphong,chisodiencuoi,chisonuoccuoi,ngayghiso) values('".$mp."','".$sd."','".$sn."', '".date('Y/m/d')."')";
								$qrtdn =  mysqli_query($kn,$cmtdn) or die("không thêm được điện nước");
								echo "<script>alert('Thêm thành công!')</script>";
							}
						}
					}
				}
			?>
		
 	</div>
 		<script type="text/javascript" src="bootstrap/js/bootstrap.js"></script>
		<script type="text/javascript" src="./javascript/jquery-3.3.1.min.js"></script>
		<script type="text/javascript" src="./javascript/popper.min.js"></script>
 	</body>
 </html>
 <?php
  load_footer();
 ?>