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

				$conn = mysqli_connect("localhost","root","","baitapnhom");
				
				$sqlQuery = "SELECT * FROM `taikhoan` WHERE `email` LIKE '".$email."'";
				$result = mysqli_query($conn, $sqlQuery);
				//$sqlQuery = "SELECT * FROM `taikhoan` WHERE `email` LIKE '".$email."' AND `matkhau` LIKE '".$password."'";
				
				// check email co ton tai khong
				if(mysqli_num_rows($result) == 0) {
					echo "<script>alert('Email không tồn tại!');</script>"; 
				}
				else {
					
					// check mat khau 
					$row = mysqli_fetch_assoc($result);

					if($row['matkhau'] != $password) {
						echo "<script>alert('Sai mật khẩu!');</script>"; 
					}
					else {
						session_start();
						$_SESSION['email'] = $row['email'];
						setcookie('email', $row['email'], time() + 72000);
						mysqli_close($conn);
						header("Location: ./trangchu.php");	
					}
				}
			}
		?>
		<form method="post">
			<div class="box">
				<div class="navigation">
					<a href="./dangky.php">Trang đăng ký</a>
					<a href="./trangchu.php">Trang chủ</a>
				</div>				

				<input type="email" name="email" placeholder="Nhập vào Email" onFocus="" onblur="" class="email" />
				<p class="validated emailValidation" style="display: none;">Bạn chưa nhập Email</p>

				<input type="password" name="password" placeholder="Nhập vào Mật khẩu" onFocus="" onblur="" class="password" />
				<p class="validated passwordValidation" style="display: none;">Bạn chưa nhập Mật khẩu</p>
				<div class="btn">Đăng nhập</div> 
			</div> 
		</form>
		<frame name="frame" style="display: none;"></iframe>
		<script language="javascript" src="./assets/js/dangnhap.js"></script>
	</body>
</html>
	

	
