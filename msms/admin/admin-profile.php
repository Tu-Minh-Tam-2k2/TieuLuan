<?php
session_start();
error_reporting(0);
include('includes/dbconnection.php');
if (strlen($_SESSION['bpmsaid'] == 0)) {
	header('location:logout.php');
} else {
	if (isset($_POST['submit'])) {
		$adminid = $_SESSION['bpmsaid'];
		$aname = $_POST['adminname'];
		$mobno = $_POST['contactnumber'];

		$query = mysqli_query($con, "update tbladmin set AdminName ='$aname', MobileNumber='$mobno' where ID='$adminid'");
		if ($query) {

			echo '<script>alert("Hồ sơ quản lý đã được cập nhật")</script>';
		} else {
			echo '<script>alert("Đã xảy ra lỗi. Vui lòng thử lại.")</script>';
		}
	}
?>
	<!DOCTYPE HTML>
	<html>

	<head>
		<title>Hồ sơ quản lý</title>
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

	<body class="cbp-spmenu-push">
		<div class="main-content">
			<?php include_once('includes/sidebar.php'); ?>
			<?php include_once('includes/header.php'); ?>
			<div id="page-wrapper">
				<div class="main-page">
					<div class="forms">
						<h3 class="title1">Hồ sơ quản lý</h3>
						<div class="form-grids row widget-shadow" data-example-id="basic-forms">
							<div class="form-title">
								<h4>Cập nhật hồ sơ :</h4>
							</div>
							<div class="form-body">
								<form method="post">
									<p style="font-size:16px; color:red" align="center"> <?php if ($msg) {
																								echo $msg;
																							}  ?> </p>

									<?php
									$adminid = $_SESSION['bpmsaid'];
									$ret = mysqli_query($con, "select * from tbladmin where ID='$adminid'");
									$cnt = 1;
									while ($row = mysqli_fetch_array($ret)) {

									?>
										<div class="form-group"> <label for="exampleInputEmail1">Tên quản lý</label> <input type="text" class="form-control" id="adminname" name="adminname" placeholder="Admin Name" value="<?php echo $row['AdminName']; ?>"> </div>
										<div class="form-group"> <label for="exampleInputPassword1">Tên đăng nhập</label> <input type="text" id="username" name="username" class="form-control" value="<?php echo $row['UserName']; ?>" readonly="true"> </div>
										<div class="form-group"> <label for="exampleInputPassword1">Số điện thoại</label> <input type="text" id="contactnumber" name="contactnumber" class="form-control" value="<?php echo $row['MobileNumber']; ?>"> </div>
										<div class="form-group"> <label for="exampleInputPassword1">Email</label> <input type="email" id="email" name="email" class="form-control" value="<?php echo $row['Email']; ?>" readonly='true'> </div>
										<button type="submit" name="submit" class="btn btn-default">Cập nhật</button>
								</form>
							</div>
						<?php } ?>
						</div>
					</div>
				</div>
				<?php include_once('includes/footer.php'); ?>
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
<?php } ?>