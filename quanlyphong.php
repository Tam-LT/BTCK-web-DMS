<?php
require 'side.php';
load_header();
load_menuql();
 ?>
 <!DOCTYPE html>
 <html>
 	<head>
	 	<title>Quản lý phòng</title>
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
					  <a class="nav-link active" href="quanlyphong.php">Tìm kiếm Phòng</a>
					  <a class="nav-link" href="themphong.php">Thêm mới phòng</a>
					</nav>
				</div>
				<div class="col-sm-9">
					<table align="center" id = "tt" style="padding: 20px;">
						<form method="POST">
							<tr>
								<td>
									<input class="text" type="text" name="txtmp" placeholder="Nhập mã phòng">
								</td>
								<td>
									<input class="btn btn-primary" type="submit" name="btntk" value="Tìm kiếm">
								</td>
								<td>
									<input class="btn btn-primary" type="submit" name="btndsp" value="Danh sách" style="margin-left: 0px;">
								</td>
							</tr>
						</form>
					</table>
					<?php
						include('connectionstring.php');
						if(isset($_POST['btntk'])){
							if(empty($_POST['txtmp'])){
								echo "<script>alert('Vui lòng nhập tên sinh viên cần tìm!')</script>";
							}
							else{
								$mp = $_POST['txtmp'];
								$cm = "select * from phong where maphong = '".$mp."'";
								$qr = mysqli_query($kn,$cm) or die("không lấy được sinh viên");
								echo"<div  style = 'text-align:center; padding-bottom:10px; color:blue;'><b>KẾT QUẢ TÌM KIẾM</b></div>";	
								echo "<table align='center' id='tbsv'>";
								echo"<tr><td>Mã phòng</td><td>Số lượng sv</td><td>Giá tiền</td><td>Tình trạng</td><td>Mô tả</td><td>Sửa</td></tr>";
								while ($dong = mysqli_fetch_array($qr)) {
									$mp = $dong['maphong'];
									echo "<tr><td>".$dong['maphong']."</td><td>".$dong['soluongsv']."</td><td>".$dong['giatien']."</td><td>".$dong['tinhtrangphong']."</td><td>".$dong['motakhac']."</td><td><a href='suaphong.php?ma=$mp'>Sửa</a></td></tr>";
								}
								echo "</table>";
							}
						}
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
								echo"<div  style = 'text-align:center; padding-bottom:10px; color:blue;'><b>DANH SÁCH PHÒNG</b></div>";	
								echo "<table align='center' id='tbsv'>";
								echo"<tr><td>Mã phòng</td><td>Số lượng sv</td><td>Giá tiền</td><td>Tình trạng</td><td>Mô tả</td><td>Sửa</td></tr>";
								while ($dong = mysqli_fetch_array($kqpt)) {
									$mp = $dong['maphong'];
									echo "<tr><td>".$dong['maphong']."</td><td>".$dong['soluongsv']."</td><td>".$dong['giatien']."</td><td>".$dong['tinhtrangphong']."</td><td>".$dong['motakhac']."</td><td><a href='suaphong.php?ma=$mp'>Sửa</a></td></tr>";
								}
								echo "</table>";
								for($i=0; $i<$sotrangdl; $i++)
									echo "<a href = 'quanlyphong.php?trang=$i' style='margin-left:30px; margin-right:-25px;'>>>$i</a>";
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