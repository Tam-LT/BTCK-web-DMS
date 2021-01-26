<?php
require 'side.php';
load_header();
load_menuql();
?>
<!DOCTYPE html>
<html>
<head>
	<title>Trang chủ</title>
	<link rel="stylesheet" type="text/css" href="bootstrap/css/bootstrap.css"/>
	<link rel="stylesheet" type="text/css" href="./style/slide.css">
	<script src="./javascript/thongbao.js" type="text/javascript"></script>
	<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.1.0/css/all.css" integrity="sha384-lKuwvrZot6UHsBSfcMvOkWwlCMgc0TaWr+30HWe3a4ltaBwTZhyTEggF5tJv8tbt" crossorigin="anonymous">
</head>
<body style="background-color: lightblue;">
	<style type="text/css">
	</style>
	<div class="container" style="background-color: white;">
 		<div class="row">
	 		<div class="col-sm-9" style="padding: 5px; padding-right: 0">
	 			<div>
	 				<div class="khoi-slide" style="width: 100%; height: 300px; margin-bottom: 5px;">
					   <div class="cac-slide">
					      <div class="slide active">
					      	<img src="./image/ktx.jpg" style="width: 100%;height: 300px;">
					      </div>
					      <div class="slide" style="width: 100%;">
					      	<img src="./image/ktx1.jpg" style="width: 100%; height: 300px;">
					      </div>
					      <div class="slide" style="width: 100%;">
					      	<img src="./image/tải xuống.jfif" style="width: 100%;height: 300px;">
					      </div>
					      <div class="slide" style="width: 100%;">
					      	<img src="./image/images.jfif" style="width: 100%;height: 300px;">
					      </div>
					   </div>
					</div>
					<div class="nut-slide">
						<span id="btn-prev"><i></i></span>
						<span id="btn-next"><i></i></span>
					</div>
	 			</div>
	 			<div>
	 				<div style="background-color: lightblue; border-radius: 2px; padding-left: 5px; height: 25px;">
	 					<h6>Một số thông tin chung về KTX</h6>
	 				</div>
	 				<div style="padding: 5px;">
	 					<p style="text-align: justify;">
	 						<span style="font-size: 11pt;">&nbsp;&nbsp;&nbsp; Ký túc xá Trường Đại học Quy Nhơn- Địa chỉ tin cậy cho sinh viên an tâm sinh hoạt, học tập và rèn luyện. Với sức chứa 8.780&nbsp;Sinh viên tọa lạc tại trường&nbsp;đại học Quy Nhơn <em>(Quy Nhơn-Bình Định), </em>là nơi rất thuận tiện trong việc ăn ở, sinh hoạt và học tập tại Trường. KTX có hàng rào bao quanh, có lực lượng bảo vệ chuyên nghiệp 24/24.
	 						</span>
	 					</p>
	 					<p style="text-align: justify;">
	 						<span style="font-size: 11pt;">&nbsp;&nbsp;&nbsp;Tất cả sinh viên <em>(SV)</em> có nhu cầu ở KTX đều được bố trí vào ở ngay sau khi nộp hồ sơ nhập học.
	 						</span>
	 					</p>
	 					<p style="text-align: justify; color: blue;">
	 						<span style="font-size: 11pt;">&nbsp;&nbsp;&nbsp;
	 						 Những tiện ích dành cho SV nội trú:
	 						</span>
	 					</p>
	 					<p style="text-align: justify;">
	 						<span style="font-size: 11pt;">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; - Wifi tốc độ kết nối là 14Mbps/ 14Mbps <em>(download/upload)</em>, miễn phí gởi xe đạp.
	 						</span>
	 					</p>
	 					<p style="text-align: justify;">
	 						<span style="font-size: 11pt;">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; - Các khu KTX đều có hệ thống siêu thị mini, căng-tin, nhà xe. Căntin, nhà ăn: Phục vụ SV với nhiều mức giá cho SV lựa chọn tùy theo nhu cầu, bảo đảm về dinh dưỡng và tuyệt đối về vệ sinh, an toàn thực phẩm <em>(được chứng nhận của cơ quan chức năng TP. Quy Nhơn) với</em> nhiều mức giá cho SV lựa chọn tùy khả năng và nhu cầu.
	 						</span>
	 					</p>
	 					<p style="text-align: justify;">
	 						<span style="font-size: 11pt;">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; - Được tham gia các câu lạc bộ học thuật, các hoạt động văn hóa, văn nghệ, thể dục thể thao, rèn luyện kỹ năng mềm.
	 						</span><br>
	 						<span style="font-size: 11pt;">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; - Khu vui chơi, luyện tập TDTT cho SV.</span><br>
	 						<span style="font-size: 11pt;">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; - Ngoài ra còn các dịch vụ khác phục vụ nhu cầu ăn, ở và sinh hoạt của SV.
	 						</span>
	 					</p>
	 					<p style="text-align: justify;">
	 						<span style="font-size: 11pt;">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; KTX có loại phòng 
	 							<strong>được phép nấu ăn, </strong>
	 							với sức chứa tối thiểu<strong> 03 SV</strong>.
	 						</span>
	 					</p>
	 					<p style="text-align: justify;">
	 						<span style="font-size: 11pt;">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; Phí KTX từ 120.000 - 270.000 đồng/SV/tháng <em>(Chưa bao gồm phí điện, nước).</em> SV có thể lựa chọn thích hợp theo nhu cầu và điều kiện kinh tế.
	 						</span>
	 					</p>
	 					<p style="text-align: justify;">
	 						<span style="font-size: 11pt;">&nbsp;&nbsp;&nbsp;&nbsp; * SV diện chính sách – xã hội, SV có hoàn cảnh khó khăn:
	 						</span>
	 					</p>
	 					<p style="text-align: justify;">
	 						<span style="font-size: 11pt;">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; + Loại bố trí 08 SV/phòng <em>(04 giường tầng).</em> Đây là đối tượng phục vụ chính của KTX. Nhà trường đảm bảo đáp ứng đầy đủ các nhu cầu chỗ ở nội trú của SV thuộc đối tượng này.
	 						</span>
	 					</p>
	 					<p style="text-align: justify;">
	 						<span style="font-size: 11pt;">&nbsp;&nbsp;&nbsp;&nbsp; * SV ở theo nhu cầu <em>(ứng với các mức phí khác nhau, nếu KTX còn chỗ):</em>
	 						</span>
	 					</p>
	 					<p style="text-align: justify;">
	 						<span style="font-size: 11pt;">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; - Khu A:<em><br></em>
	 						</span>
	 					</p>
	 					<p style="text-align: justify;">
	 						<span style="font-size: 11pt;">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; + Loại bố trí 03 SV/phòng <em>(được phép nấu ăn)</em>;
	 						</span>
	 					</p>
	 					<p style="text-align: justify;">
	 						<span style="font-size: 11pt;">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; + Loại bố trí 04 SV/phòng <em>(được phép nấu ăn)</em>;
	 						</span>
	 					</p>
	 					<p style="text-align: justify;">
	 						<span style="font-size: 11pt;">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; + Loại bố trí 05 SV/phòng <em>(được phép nấu ăn)</em>;
	 						</span>
	 					</p>
	 					<p style="text-align: justify;">
	 						<span style="font-size: 11pt;">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; + Loại bố trí 06 SV/phòng <em>(được phép nấu ăn)</em>;
	 						</span>
	 					</p>
	 					<p style="text-align: justify;">
	 						<span style="font-size: 11pt;">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; + Loại bố trí 08 SV/phòng <em>(được phép nấu ăn)</em>;
	 						</span>
	 					</p>
	 					<p style="text-align: justify;">
	 						<span style="font-size: 11pt;">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; - Khu B:
	 						</span>
	 					</p>
	 					<p style="text-align: justify;">
	 						<span style="font-size: 11pt;">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; + Loại bố trí 04 SV/phòng <em>(04 giường tầng)</em>;
	 						</span>
	 					</p>
	 					<p style="text-align: justify;">
	 						<span style="font-size: 11pt;">&nbsp;&nbsp;&nbsp;&nbsp; - SV trả tiền điện, nước theo chỉ số sử dụng thực tế. Mức tính giá điện, nước theo giá tiêu dùng hộ gia đình.
	 						</span>
	 					</p>
	 					<p style="text-align: justify;">
	 						<span style="font-size: 11pt;">&nbsp;&nbsp;&nbsp;&nbsp; - Nếu gửi xe gắn máy hoặc môtô phải nộp thêm khoản phí phụ thu giữ xe theo quy định.
	 						</span>
	 					</p>
	 				</div>
	 			</div>				
	 		</div>
	 		<div class="col-sm-3" style="padding: 5px;">
	 			<div class="card" style="width: 100%;margin-bottom: 5px;">
				  <div class="card-body" style="padding: 0">
				  	<div style="background-color: darkblue; border-top-right-radius: 5px;border-top-left-radius: 5px; height: 30px;padding-left: 7px; color: white; padding-top: 5px;">
				  		<h6>Số chỗ trống hiện tại của KTX</h6>
				  	</div>
				    <div style="padding: 5px 10px 5px 10px">
				    	<p style="text-align: justify;">
				    		<span style="font-size: 11pt;">&nbsp;- Sinh viên <em>(SV)</em> có nhu cầu ở KTX, đăng ký online bằng tài khoản SV. Trung tâm sắp chỗ và phản hồi kết quả sắp chỗ qua email SV và thứ 3 hàng tuần. SV đóng phí và nhận chỗ ở ngay.
				    		</span>
				    	</p>
						<p style="text-align: justify;">
							<span style="font-size: 11pt;">- Mọi thắc mắc vui lòng
								<span style="color: #ff0000;">gửi email cho thầy Nguyễn Khắc Khanh <em>(nkk@qnu.edu.vn) </em>
									<span style="color: #000000;">để được phản hồi.
									</span><em><br></em>
								</span>
							</span>
						</p>
				    </div>
				    
				  </div>
				</div>
				<div class="card" style="width: 100%; margin-bottom: 5px;">
				  <div class="card-body" style="padding: 0">
				  	<div style="background-color: darkblue; border-top-right-radius: 5px;border-top-left-radius: 5px; height: 30px;padding-left: 7px; color: white; padding-top: 5px;">
				  		<h6>Thông báo</h6>
				  	</div>
				    <div style="padding: 5px 10px 5px 10px">
				    	<div class="art-block clearfix">
							<div class="art-blockcontent">
								<div style="padding-top:3px;padding-bottom:8px;">
						  			<div style="text-align: left; vertical-align: middle; text-decoration: none; overflow: hidden; position: relative; margin-left: 1px; height: 117px; font-size: 11pt" id="crs_Holder">
						  				<div class="crs_div" style="padding:3px 0px 3px 0px;border-bottom: 1px dotted #ccc;">
						  					<a href="#">Đăng ký ở KTX học kỳ 2 năm học 2020-2021</a>
						  				</div>
						  				<div class="crs_div" style="padding:3px 0px 3px 0px;border-bottom: 1px dotted #ccc;">
						  					<a href="#">Thông báo Giao lưu thể thao</a>
						  				</div>
						  				<div class="crs_div" style="padding:3px 0px 3px 0px;border-bottom: 1px dotted #ccc;">
						  					<a href="#">Giao lưu cờ vua, cờ tướng</a>
						  				</div>
						  				<div class="crs_div" style="padding:3px 0px 3px 0px;border-bottom: 1px dotted #ccc;">
						  					<a href="#">Đăng ký ở KTX học kỳ 1, năm học 2020-2021</a>
						  				</div>
						  			</div>
								</div>
								<script type="text/javascript">
									var crs_array	= new Array();
									var crs_obj	= '';
									var crs_scrollPos 	= '';
									var crs_numScrolls	= '';
									var crs_heightOfElm = '39';
									var crs_numberOfElm = '3';
									var crs_scrollOn 	= 'true';
									function vsra_createscroll() 
									{
										crs_array[0] = '<div class=\'crs_div\' style=\'padding:3px 0px 3px 0px;border-bottom: 1px dotted #ccc;\'><a href=\'/thong-bao/142-tbbcnu2020.html\'>Thông báo Giao lưu thể thao bóng chuyền nữ năm 2020</a></div>'; crs_array[1] = '<div class=\'crs_div\' style=\'padding:3px 0px 3px 0px;border-bottom: 1px dotted #ccc;\'><a href=\'/thong-bao/140-dkhk22021.html\'>Đăng ký ở KTX học kỳ 2 năm học 2020-2021</a></div>'; crs_array[2] = '<div class=\'crs_div\' style=\'padding:3px 0px 3px 0px;border-bottom: 1px dotted #ccc;\'><a href=\'/thong-bao/134-bcnam-2020.html\'>Thông báo Giao lưu thể thao</a></div>'; crs_array[3] = '<div class=\'crs_div\' style=\'padding:3px 0px 3px 0px;border-bottom: 1px dotted #ccc;\'><a href=\'/thong-bao/137-co.html\'>Giao lưu cờ vua, cờ tướng</a></div>'; crs_array[4] = '<div class=\'crs_div\' style=\'padding:3px 0px 3px 0px;border-bottom: 1px dotted #ccc;\'><a href=\'/thong-bao/136-dkhk12021.html\'>Đăng ký ở KTX học kỳ 1, năm học 2020-2021</a></div>'; 	crs_obj	= document.getElementById('crs_Holder');
										crs_obj.style.height = (crs_numberOfElm * crs_heightOfElm) + 'px';
										vsra_content();
									}
								</script>
								<script type="text/javascript">
								vsra_createscroll();
								</script>
							</div>
						</div>
				    </div>
				    
				  </div>
				</div>
				<div class="card" style="width: 100%;margin-bottom: 5px; height: 300px;">
				  	<iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3875.3300727571914!2d109.21555531448968!3d13.758957890342781!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x316f6cebf252c49f%3A0xa83caa291737172f!2zVHLGsOG7nW5nIMSQ4bqhaSBI4buNYyBRdXkgTmjGoW4!5e0!3m2!1svi!2s!4v1610936585635!5m2!1svi!2s" height="300px;"></iframe>
					
				</div>
	 		</div>
	 	</div>
	 </div>
</body>
	<script type="text/javascript" src="bootstrap/js/bootstrap.js"></script>
	<script type="text/javascript" src="js/jquery-3.3.1.min.js"></script>
	<script type="text/javascript" src="js/popper.min.js"></script>
	<script type="text/javascript" src="./javascript/slide.js"></script>
	
</html>
<?php
load_footer();
?>