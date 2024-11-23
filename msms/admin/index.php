<?php
session_start();
error_reporting(0);
include('includes/dbconnection.php');

if (isset($_POST['login'])) {
	$adminuser = $_POST['username'];
	$password = md5($_POST['password']);
	$query = mysqli_query($con, "select ID from tbladmin where  UserName='$adminuser' && Password='$password' ");
	$ret = mysqli_fetch_array($query);
	if ($ret > 0) {
		$_SESSION['bpmsaid'] = $ret['ID'];
		echo "<script type='text/javascript'> document.location ='dashboard.php'; </script>";
	} else {
		echo "<script>alert('Invalid Details');</script>";
	}
}
?>
<!DOCTYPE HTML>
<html>

<head>
	<title>Đăng nhập</title>
	<link rel="icon" href="https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcSt_fFcgxLjUPU6g9y-vlIidTz7J3I1vhQrRA&s" type="image/x-icon">
	<script type="application/x-javascript">
		addEventListener("load", function() {
			setTimeout(hideURLbar, 0);
		}, false);

		function hideURLbar() {
			window.scrollTo(0, 1);
		}
	</script>
	<link href="css/bootstrap.css" rel='stylesheet' type='text/css' />
	<link href="css/style.css" rel='stylesheet' type='text/css' />
	<link href="css/font-awesome.css" rel="stylesheet">
	<script src="js/jquery-1.11.1.min.js"></script>
	<script src="js/modernizr.custom.js"></script>
	<link href='//fonts.googleapis.com/css?family=Roboto+Condensed:400,300,300italic,400italic,700,700italic' rel='stylesheet' type='text/css'>
	<link href="css/animate.css" rel="stylesheet" type="text/css" media="all">
	<script src="js/wow.min.js"></script>
	<script>
		new WOW().init();
	</script>
	<script src="js/metisMenu.min.js"></script>
	<script src="js/custom.js"></script>
	<link href="css/custom.css" rel="stylesheet">
</head>

<body class="">
	<div class="main-content">
		<div id="page-wrapper">
			<div class="main-page login-page ">
				<h3 class="title1">Đăng nhập</h3>
				<div class="widget-shadow">
					<div class="login-top">
						<h4>Chào mừng bạn đến trang Quản lý ! </h4>
					</div>
					<div class="login-body">
						<form role="form" method="post" action="">

							<input type="text" class="user" name="username" placeholder="Tên đăng nhập" required="true">
							<input type="password" name="password" class="lock" placeholder="Mật khẩu" required="true">
							<input type="submit" name="login" value="Sign In">
							<div class="forgot-grid">

								<div class="forgot">
									<a href="../index.php">Trở lại Trang chủ</a>
								</div>
								<div class="clearfix"> </div>
							</div>
							<div class="forgot-grid">

								<div class="forgot">
									<a href="forgot-password.php">Quên mật khẩu?</a>
								</div>
								<div class="clearfix"> </div>
							</div>
						</form>
					</div>
				</div>
			</div>
		</div>
	</div>
	<!-- Classie -->
	<script src="js/classie.js"></script>
	<script>
		var menuLeft = document.getElementById('cbp-spmenu-s1'),
			showLeftPush = document.getElementById('showLeftPush'),
			body = document.body;

		showLeftPush.onclick = function() {
			classie.toggle(this, 'active');
			classie.toggle(body, 'cbp-spmenu-push-toright');
			classie.toggle(menuLeft, 'cbp-spmenu-open');
			disableOther('showLeftPush');
		};

		function disableOther(button) {
			if (button !== 'showLeftPush') {
				classie.toggle(showLeftPush, 'disabled');
			}
		}
	</script>
	<script src="js/jquery.nicescroll.js"></script>
	<script src="js/scripts.js"></script>
	<script src="js/bootstrap.js"> </script>
</body>

</html>