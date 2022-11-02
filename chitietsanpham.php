<!doctype html>
<html>
	<head>
		<meta charset="UTF-8">
		<link rel="stylesheet" href="./assets/css/header.css">
		<link rel="stylesheet" href="./assets/css/footer.css">
		<link rel="stylesheet" href="./assets/css/chitietsanpham.css">
		<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.0/css/all.min.css">
	</head>
	<body>
		<?php 
			session_start();

			if (!isset($_SESSION['email'])) {
					header("Location: ./dangnhap.php");	
				exit;
			}
	
			if ($_SERVER["REQUEST_METHOD"] == "POST") {
				if(isset($_POST['logout']))	{
					setcookie('email', '', -1);
					unset($_COOKIE['email']);
					unset($_SESSION['email']);
					header("Location: ./trangchu.php");	
				}
			}
				
		?>
		<div id="header">
				<div class="main-left">
					<a href="./trangchu.php">Paula's Choice</a>
				</div>
				<div class="main-right">
					<?php 
						echo '<p>'.$_SESSION['email'].'</p>';
		 				echo '<form action="" method="post">';
						echo '<input type="submit" name="logout" value="Đăng xuất" />';
						echo '</form>';
					?>
				</div>
		</div>
		<div id="banner">
			<img src="./assets/image/banner.jpg"/>
		</div>
		<div id="product">
			<h1 class="title">
				Chi tiết sản phẩm
			</h1>

			<div class="product-detail">
			<?php
				$conn = mysqli_connect("localhost","root","","baitapnhom");
				$sqlQuery = "SELECT * FROM `sanpham` WHERE `masanpham` LIKE '".$_GET['id']."'";
				$result = mysqli_query($conn, $sqlQuery);
				
				if(mysqli_num_rows($result) == 0){
					header("Location: ./trangchu.php");	
					exit;
				}

				while($row = mysqli_fetch_assoc($result)){				
					echo '
						<div class="detail-img">
							<img src="./assets/image/'.$row['url'].'"/>
						</div>
						<div class="detail-content">
							<h3 class="item-title">
								Tên sản phẩm: '.$row['tensanpham'].'
							</h3>
							<p class="item-price">
								Giá sản phẩm: '.$row['gia'].'VNĐ
							</p>
							<p class="item-description">
								Mô tả sản phẩm: '.$row['mota'].'
							</p>
						</div>
					';	
   				}

				mysqli_close($conn);
			?>
			</div>
		</div>

		<div id="contact">
			<div class="social-network">
				<a href="https://www.facebook.com/paulaschoice.vn/"><i class="fa-brands fa-square-facebook"></i></a>
				<a href="https://www.instagram.com/paulaschoice/"><i class="fa-brands fa-instagram"></i></a>
				<a href="https://twitter.com/PaulasChoice/"><i class="fa-brands fa-square-twitter"></i></a>
				<a href="https://www.youtube.com/channel/UCmAkPaNe86WAuzep2zBgW2g"><i class="fa-brands fa-youtube"></i></a>
				<a href="https://www.tiktok.com/discover/Paulas-Choice-VN"><i class="fa-brands fa-tiktok"></i></i></a>
			</div>
			<div class="address">
				<h3>276 Cao Thắng, Phường 12, Quận 10, TP.HCM</h3>
				<h3>Hotline: 0917.733.458</h3>
				<h3>B1 TTTM – Takashimaya Việt Nam – Saigon Centre, 92 – 94 Nam Kỳ Khởi Nghĩa,</h3>
				<h3>Hotline: 0968.56.52.50</h3>
			</div>
		</div>
	</body>
</html>
	

	
