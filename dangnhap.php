<?php
session_start();
?>
<!DOCTYPE html>
<html>
<head>
	<title>Đăng nhập</title>
	<link rel="stylesheet" type="text/css" href="bootstrap/css/bootstrap.css"/>
	<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.1.0/css/all.css" integrity="sha384-lKuwvrZot6UHsBSfcMvOkWwlCMgc0TaWr+30HWe3a4ltaBwTZhyTEggF5tJv8tbt" crossorigin="anonymous">
</head>
<body>
	<style type="text/css">
		#imgdn{
			width: 100%;
			height:85%;
		}
		table{
			width: 100%;
			height: 85%;
			background-color: lightblue;
			border-top-left-radius: 10px;
			border-bottom-left-radius: 10px;
		}
		td{
			text-align: center;
			padding-top: : 5px;
		}
		.btn{
			padding: 0;
			height: 30px;
			width: 90px;
		}
		.text{
			border-radius: 5px;
			border-color: #e7ebf0;
		}
	</style>
	<div class="container" style="margin-top: 100px;">
	  <div class="row">
	  	<div class="col-sm-4" style="padding-right: 0">
	  		<table id="TT" align="center">
	  			<form method="POST">
	  			<tr>
	  				<td style="padding-top: 30px;">
	  					<b style="margin-top: 20px; color: darkblue">Thông tin đăng nhập</b>	
	  				</td>
	  			</tr>
	  			<tr>
	  				<td>
	  					<div style="padding-top: 10px;">
	  						<img src="./image/user.png">
	  						<input class="text" type="text" name="txtusername" placeholder="Tên đăng nhập">	<br>
	  					</div>
	  					<div style="padding-top: 10px;">
	  						<img src="./image/key.png" style="width: 30px; height: 30px;">
	  						<input class="text" type="password" name="txtpass" placeholder="Mật khẩu">	<br>
	  					</div>
	  					<div style="padding-top: 10px;">
	  						<input type="checkbox" name="ckblutk">	Lưu thông tin tài khoản<br>
	  					</div>
	  					<div style="padding-top: 10px; margin-left: 130px;">
	  						<input type="submit" class="btn btn-primary" name="btndn" value="Đăng nhập">
	  					</div>	  					

	  				</td>
	  				
	  			</tr>
	  			<tr></tr>
	  			</form>
	  		</table>
	  		<?php
	  			if(isset($_POST['btndn'])){
	  				$tendn = $_POST['txtusername'];
	  				$mk = $_POST['txtpass'];
	  				include('connectionstring.php');
	  				$cm = "select * from sinhvien where masv = '".$tendn."'";
	  				$query = mysqli_query($kn,$cm);
	  				if($dong = mysqli_fetch_array($query)){
	  					if($dong['matkhau']==$mk){
	  						$_SESSION['user'] = $tendn;
	  						 header('Location: sinhvien.php');
	  					}
	  					else{
	  						echo "<script>alert('Mật khẩu không đúng')</script>";
	  					}
	  				}
	  				else{
	  					$ql = "select * from quanly where maql = '".$tendn."'";
	  					$qrql = mysqli_query($kn,$ql);
	  					if($dong1 = mysqli_fetch_array($qrql)){
	  						if($dong['matkhau']=$mk){
	  							$_SESSION['user'] = $tendn;
	  							header('Location: quanly.php');
	  						}
	  						else{
	  							echo "<script>alert('Mật khẩu không đúng')</script>";
	  						}
	  					}
	  					else{
	  						echo "<script>alert('Tên đăng nhập không tồn tại')</script>";
	  					}
	  				}
	  			}
	  		?>
	  	</div>
	  	<div class="col-sm-8" style="padding-left: 0;">
	  		<img id= "imgdn" src="./image/ktx.jpg" style="border-top-right-radius: 10px; border-bottom-right-radius: 10px;">
	  	</div>
  	   </div>
	</div>
	<script type="text/javascript" src="bootstrap/js/bootstrap.js"></script>
	<script type="text/javascript" src="./javascript/jquery-3.3.1.min.js"></script>
	<script type="text/javascript" src="./javascript/popper.min.js"></script>
</body>
</html>