<?php
session_start();
error_reporting(0);
include('includes/dbconnection.php');
error_reporting(0);

if (isset($_POST['submit'])) {
	$contactno = $_SESSION['contactno'];
	$email = $_SESSION['email'];
	$password = md5($_POST['newpassword']);

	$query = mysqli_query($con, "update tbladmin set Password='$password'  where  Email='$email' && MobileNumber='$contactno' ");
	if ($query) {
		echo "<script>alert('Mật khẩu đã đổi thành công');</script>";
		session_destroy();
	}
}
?>
<!DOCTYPE HTML>
<html>

<head>
	<title>MSMS | Reset Page </title>
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
	<script type="text/javascript">
		function checkpass() {
			if (document.changepassword.newpassword.value != document.changepassword.confirmpassword.value) {
				alert('New Password and Confirm Password field does not match');
				document.changepassword.confirmpassword.focus();
				return false;
			}
			return true;
		}
	</script>
</head>

<body class="">
	<div class="main-content">
		<div id="page-wrapper">
			<div class="main-page login-page ">
				<h3 class="title1">Đặt lại mật khẩu</h3>
				<div class="widget-shadow">
					<div class="login-top">
						<h4>Đặt lại mật khẩu của bạn ! </h4>
					</div>
					<div class="login-body">
						<form role="form" method="post" action="" name="changepassword" onsubmit="return checkpass();">

							<input type="password" name="newpassword" class="lock" placeholder="New Password" required="true">

							<input type="password" name="confirmpassword" class="lock" placeholder="Confirm Password" required="true">

							<input type="submit" name="submit" value="Reset">
							<div class="forgot-grid">

								<div class="forgot">
									<a href="index.php">Already have an account</a>
								</div>
								<div class="clearfix"> </div>
							</div>
						</form>
					</div>
				</div>
			</div>
		</div>
	</div>
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