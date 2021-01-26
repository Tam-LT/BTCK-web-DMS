<?php
require 'side.php';
load_header();
load_menusv();
?>
<!DOCTYPE html>
<html>
	<head>
		<title>
			Hợp đồng
		</title>
		<link rel="stylesheet" type="text/css" href="bootstrap/css/bootstrap.css"/>
		<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.1.0/css/all.css" integrity="sha384-lKuwvrZot6UHsBSfcMvOkWwlCMgc0TaWr+30HWe3a4ltaBwTZhyTEggF5tJv8tbt" crossorigin="anonymous">
	</head>
	<body style="background-color: lightblue;">
		<style type="text/css">
			table{
				width: 200px;
				border-radius: 10px;
				background-color: lightblue;
				width: 400px;
				margin-bottom: 20px;
			}
			td{
				padding: 10px;
			}
			input.text{
				border-radius: 5px;
				border-color: #e7ebf0;
				width: 250px;
			}
			input.btn{
				height: 30px;
				padding: 0;
				width: 70px;
				float: right;
			}
			#thannhan{
				text-align: center;
				color: darkblue;
				margin-bottom: 20px;
				margin-top: 20px;
			}
			#thannhan b{
				color: darkblue;
			}

		</style>
		<div class="container" style="background-color: white;">
		  <div class="row">
		  	<div id="thannhan">
		  		<b>
		  			NHẬP THÔNG TIN THÂN NHÂN
		  		</b>
		  	</div>
		  	<form method="POST">
		  	<table align="center" style="width: 400px;">
		  		<tr>
		  			<td>
		  				<input class="text" type="text" name="txthtc" placeholder="Họ tên cha">
		  			</td>
		  			<td>
		  				<input class="text" type="text" name="txthtm" placeholder="Họ tên mẹ">
		  			</td>
		  		</tr>
		  		<tr>
		  			<td>
		  				<input class="text" type="text" name="txtnnc" placeholder="Nghề nghiệp cha">
		  			</td>
		  			<td>
		  				<input class="text" type="text" name="txtnnm" placeholder="Nghề nghiệp mẹ">
		  			</td>
		  		</tr>
		  		<tr>
		  			<td>
		  				<input class="text" type="text" name="txtsdtc" placeholder="SĐT cha">
		  			</td>
		  			<td>
		  				<input class="text" type="text" name="txtsdtm" placeholder="SĐT mẹ">
		  			</td>
		  		</tr>
		  		<tr>
		  			<td colspan="2">
		  				<input class="btn btn-primary" type="submit" name="btnthoat" value="Thoát">
		  				<input class="btn btn-primary" type="submit" name="btnht" value="Hoàn tất" style="margin-right: 10px;">		  				
		  			</td>
		  		</tr>
		  	</table>
		  	</form>
		  	<?php
		  		$maphong = $_GET['ma'];
		  		$masv;
		  		$nl = date("Y-m-d");
				$nkt = date( "Y-m-d", strtotime( "".$nl." +12 month" ));
		  		if(isset($_SESSION['user'])){
		  			$masv=$_SESSION['user'];
		  		}
		  		if(isset($_POST['btnht'])){
		  			$htc = $_POST['txthtc'];
		  			$htm = $_POST['txthtm'];
		  			$nnc = $_POST['txtnnc'];
		  			$nnm = $_POST['txtnnm'];
		  			$sdtc = $_POST['txtsdtc'];
		  			$sdtm = $_POST['txtsdtm'];
		  			include('connectionstring.php');
		  			$cmkthd = "select * from hopdong where masv = '".$masv."' and ngayketthuc>='".$nl."'";
		  			$qrkthd = mysqli_query($kn,$cmkthd);
		  			if($dong=mysqli_fetch_array($qrkthd)){
		  				echo "<script> alert('Hợp đồng nội trú của bạn chưa hết hạn!')</script>";
		  			}
		  			else{
		  				$cmhd = "insert into hopdong(masv,maphong,ngaylap,ngaybatdau,ngayketthuc) values('".$masv."','".$maphong."','".$nl."','".$nl."','".$nkt."')";
			  			$query = mysqli_query($kn, $cmhd) or die("không lập được hợp đồng");
			  			$cmsv = "update sinhvien set svnt = 1 where masv = '".$masv."'";
			  			$qrsv =  mysqli_query($kn,$cmsv) or die('Không cập nhật được sinh viên');
			  			$cmtn = "select * from thannhan where masv = '".$masv."'";
			  			$qrtn = mysqli_query($kn,$cmtn) or die('Không lấy được thân nhân');
			  			if($dong=mysqli_fetch_array($qrtn)){
		  					$cmttn = "update thannhan set hotencha = '".$htc."', hotenme = '".$htm."', sdtcha = '".$sdtc."', sdtme = '".$sdtm."', nghenghiepcha = '".$nnc."', nghenghiepme = '".$nnm."' where masv = '".$masv."'";
		  					$qrttn = mysqli_query($kn,$cmttn) or die('Không cập nhật được thông tin thân nhân');
		  				}
		  				else{
		  					$cmttn = "insert into thannhan(masv, hotencha,hotenme,sdtcha,sdtme,nghenghiepcha,nghenghiepme) values('".$masv."', '".$htc."', '".$htm."', '".$sdtc."', '".$sdtm."','".$nnc."','".$nnm."')";
							$qrttn = mysqli_query($kn,$cmttn) or die('Không thêm được thông tin thân nhân');
		  				}
		  				echo "<script>alert('Đăng ký thành công')</script>";
		  			}
		  			
		  		}

		  	?>
	  	   </div>
		</div>
	</body>
	<script type="text/javascript" src="bootstrap/js/bootstrap.js"></script>
	<script type="text/javascript" src="./javascript/jquery-3.3.1.min.js"></script>
	<script type="text/javascript" src="./javascript/popper.min.js"></script>
</html>
<?php
load_footer();
?>