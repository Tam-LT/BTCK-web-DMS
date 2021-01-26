<?php
require 'side.php';
load_header();
load_menusv();
?>
<!DOCTYPE html>
<html>
<head>
	<title>Thông báo</title>
	<link rel="stylesheet" type="text/css" href="bootstrap/css/bootstrap.css"/>
	<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.1.0/css/all.css" integrity="sha384-lKuwvrZot6UHsBSfcMvOkWwlCMgc0TaWr+30HWe3a4ltaBwTZhyTEggF5tJv8tbt" crossorigin="anonymous">
</head>
<body style="background-color: lightblue;">
	<style type="text/css">
		#tbsv{
			border-radius: 10px;
			background-color:#e7ebf0;
			margin-bottom: 20px;
			width: 200px;
		}
		#tbsv td{
			padding: 7px;
		}
	</style>
	<div class="container" style="background-color: white;">
	  <div class="row">
	  	<?php
			include('connectionstring.php');
			if(isset($_SESSION['user'])){
				$nl = date("Y-m-d");
				$masv = $_SESSION['user'];
				$cm = "select * from hopdong where masv = '".$masv."' and YEAR(ngayketthuc)>=YEAR('".$nl."')";
				$qr = mysqli_query($kn,$cm) or die("không lấy được dữ liệu");
				if($dong = mysqli_fetch_array($qr)){
					$mp = $dong['maphong'];
					$cmhd = "select * from hoadon where maphong = '".$mp."'and trangthaithanhtoan = 0";
					$qrhd = mysqli_query($kn, $cmhd) or die("không lấy được hóa đơn");
					if($dong1=mysqli_fetch_array($qrhd)){
						echo"<div  style = 'text-align:center; padding-bottom:10px; color:darkblue; padding-top:20px;'><b>THÔNG TIN ĐIỆN NƯỚC</b></div>";
						echo "<table align='center' id='tbsv'>";
						echo "<tr><td>Số điện</td><td>".$dong1['sodien']."</td></tr>";
						echo "<tr><td>Số nước</td><td>".$dong1['sonuoc']."</td></tr>";
						echo "<tr><td>Tiền điện</td><td>".$dong1['tiendien']."</td></tr>";
						echo "<tr><td>Tiền nước</td><td>".$dong1['tiennuoc']."</td></tr>";
						echo "<tr><td>Tổng tiền</td><td>".$dong1['tongtien']."</td></tr>";
						echo "</table>";
					}
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