<?php
require 'side.php';
load_header();
load_menusv();
?>
<!DOCTYPE html>
<html>
<head>
	<title>Đăng ký</title>
	<title></title>
	<link rel="stylesheet" type="text/css" href="bootstrap/css/bootstrap.css"/>
	<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.1.0/css/all.css" integrity="sha384-lKuwvrZot6UHsBSfcMvOkWwlCMgc0TaWr+30HWe3a4ltaBwTZhyTEggF5tJv8tbt" crossorigin="anonymous">
</head>
<body style="background-color: lightblue;">
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
		input.btn{
			height: 30px;
			padding: 0;
			width: 150px;
			background-color: darkblue;
		}
		#tt input.btn{
				height: 30px;
				padding: 0;
				width: 70px;
				background-color: blue;
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
	</style>
	<div class="container" style="background-color: white;">
	  <div class="row">
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
			</table>
			<div style="margin-bottom: 5px; margin-left: 0;">
				<input class="btn btn-primary" type="submit" name="btndsp" value="Danh sách phòng">
			</div>
		</form>
			<?php
				include('connectionstring.php');
				//if(isset($_POST['btndsp'])){
					$sdttrang = 5;
					if(isset($_GET['trang'])){
						$page = $_GET['trang'];
					}
					else{
						$page = 0;
					}
					$lenhdem="select * from phong";
					$kqdd = mysqli_query($kn,$lenhdem) or die ("khong dem duoc");
					$sodong = mysqli_num_rows($kqdd);
					$sotrangdl = $sodong/$sdttrang;
					$vtbd = $page * $sdttrang;
					$lenhpt = "select * from phong limit {$vtbd},{$sdttrang}";
					$kqpt = mysqli_query($kn, $lenhpt)or die("thuc hien phan trang khong duoc");
					while($dong = mysqli_fetch_array($kqpt)){
						$chotrong = $dong['soluongsv'];
						$mp = $dong['maphong'];
						$kt = "select count(*) as sl from hopdong where maphong = '".$mp."'";
						$qrkt = mysqli_query($kn, $kt);
						if ($dong1 = mysqli_fetch_array($qrkt)) {
							$slsv = $dong1['sl'];
							if($slsv==$chotrong){
								echo "<table class='tbphong' style='float:left; width:200px;'>";
								echo "<tr><td>Mã phòng: ".$dong['maphong']."</td></tr><tr><td>Số lượng sv: ".$dong['soluongsv']."</td></tr></tr><tr><td>Giá tiền: ".$dong['giatien']."</td></tr></tr><tr><td>Tình trạng: ".$dong['tinhtrangphong']."</td></tr><tr><td><p style='color:red;'>Phòng đã hết chỗ</p></td></tr>";
								echo "</table>";
							}
							else{
								echo "<table class='tbphong' style='float:left; width:200px;'>";
								echo "<tr><td>Mã phòng: ".$dong['maphong']."</td></tr><tr><td>Số lượng sv: ".$dong['soluongsv']."</td></tr></tr><tr><td>Giá tiền: ".$dong['giatien']."</td></tr></tr><tr><td>Tình trạng: ".$dong['tinhtrangphong']."</td></tr><tr><td><a href='hopdong.php?ma=$mp'>Đăng ký</a></td></tr>";
								echo "</table>";
							}
						}
						
					}
					for($i=0; $i<$sotrangdl; $i++)
						echo "<a href = 'dangky.php?trang=$i' style='margin-left:5px'>>>$i</a>";
				//}
				if(isset($_POST['btntk'])){
					$maphong = $_POST['txtphong'];
					$cm="select * from phong where maphong = '".$maphong."'";
					$query = mysqli_query($kn,$cm);
					while($dong = mysqli_fetch_array($query)){
						$chotrong = $dong['soluongsv'];
						$mp = $dong['maphong'];
						$kt = "select count(*) as sl from hopdong where maphong = '".$mp."'";
						$qrkt = mysqli_query($kn, $kt);
						if ($dong1 = mysqli_fetch_array($qrkt)) {
							$slsv = $dong1['sl'];
							if($slsv==$chotrong){
								echo "<table class='tbphong' style='float:left; width:200px;'>";
								echo "<tr><td>Mã phòng: ".$dong['maphong']."</td></tr><tr><td>Số lượng sv: ".$dong['soluongsv']."</td></tr></tr><tr><td>Giá tiền: ".$dong['giatien']."</td></tr></tr><tr><td>Tình trạng: ".$dong['tinhtrangphong']."</td></tr><tr><td><p style='color:red;'>Phòng đã hết chỗ</p></td></tr>";
								echo "</table>";
							}
							else{
								echo "<table class='tbphong' style='float:left; width:200px;'>";
								echo "<tr><td>Mã phòng: ".$dong['maphong']."</td></tr><tr><td>Số lượng sv: ".$dong['soluongsv']."</td></tr></tr><tr><td>Giá tiền: ".$dong['giatien']."</td></tr></tr><tr><td>Tình trạng: ".$dong['tinhtrangphong']."</td></tr><tr><td><a href='hopdong.php?ma=$mp'>Đăng ký</a></td></tr>";
								echo "</table>";
							}
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