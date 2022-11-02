<!DOCTYPE html>
<html>
	<head>
		<meta charset="UTF-8">
		<link rel="stylesheet" href="./assets/css/form.css">
	</head>
	<body>
		<?php 
			// kiem tra xem da dang nhap chua
			if(isset($_COOKIE['email'])) {
				header("Location: ./trangchu.php");
				exit;
			}

			if ($_SERVER["REQUEST_METHOD"] == "POST") {
				$email = $_POST['email'];
				$password = $_POST['password'];
				$phonenumber = $_POST['phonenumber'];
				$date = $_POST['date'];

				$conn = mysqli_connect("localhost","root","","baitapnhom");

				// kiem tra email ton tai
				$sqlQuery_search = "SELECT * FROM `taikhoan` WHERE `email` LIKE '".$email."'";
				if(mysqli_num_rows(mysqli_query($conn, $sqlQuery_search)) != 0) {
					echo "<script>alert('Email đã tồn tại');</script>"; 
				}
				else {
					// them tai khoan
					$sqlQuery = "INSERT INTO `taikhoan` VALUES('".$email."', '".$password."', '".$phonenumber."', '".$date."')";
					mysqli_query($conn, $sqlQuery);
					mysqli_close($conn);
					echo "<script>alert('Đăng ký thành công!');</script>"; 
				}
			}
		?>
		<form method="post">
			<div class="box">
				<div class="navigation">
					<a href="./dangnhap.php">Trang đăng nhập</a>
					<a href="./trangchu.php">Trang chủ</a>
				</div>				

				<input type="email" name="email" placeholder="Nhập vào email" class="email" />
				<p class="validated emailValidation" style="display: none;">Bạn chưa nhập Email</p>

				<input type="password" name="password" placeholder="Nhập mật khẩu lớn hơn 6 kí tự" class="password" />
				<p class="validated passwordValidation" style="display: none;">Bạn chưa nhập Mật khẩu</p>


				<input type="input" name="phonenumber" placeholder="Nhập vào số điện thoại" class="phonenumber" />
				<p class="validated phonenumberValidation" style="display: none;"></p>

				<input type="text" name="date" placeholder="Nhập vào ngày sinh" onfocus="(this.type='date')" onblur="(this.type='text')" class="date" />
				<p class="validated dateValidation" style="display: none;">Bạn chưa nhập ngày sinh</p>

				<div class="btn">Đăng ký</div> 
			</div> 
		</form>
		<script language="javascript" src="./assets/js/dangky.js"></script>
	</body>
</html>
	

	
