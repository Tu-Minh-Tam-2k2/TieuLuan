<?php
session_start();
error_reporting(0);
include('includes/dbconnection.php');
if (strlen($_SESSION['bpmsaid'] == 0)) {
	header('location:logout.php');
} else {

	if (isset($_POST['submit'])) {
		$sername = $_POST['sername'];
		$cost = $_POST['cost'];
		$des = $_POST['des'];
		$eid = $_GET['editid'];

		$query = mysqli_query($con, "update  tblservices set ServiceName='$sername', Description='$des',Cost='$cost' where ID='$eid' ");
		if ($query) {

			echo '<script>alert("Dịch vụ đã được cập nhật")</script>';
		} else {
			echo '<script>alert("Something Went Wrong. Please try again.")</script>';
		}
	}
?>
	<!DOCTYPE HTML>
	<html>

	<head>
		<title>Cập nhật dịch vụ</title>
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
						<h3 class="title1">Cập nhật dịch vụ</h3>
						<div class="form-grids row widget-shadow" data-example-id="basic-forms">
							<div class="form-title">
								<h4>Cập nhật dịch vụ:</h4>
							</div>
							<div class="form-body">
								<form method="post">
									<?php
									$cid = $_GET['editid'];
									$ret = mysqli_query($con, "select * from  tblservices where ID='$cid'");
									$cnt = 1;
									while ($row = mysqli_fetch_array($ret)) {
									?>
										<div class="form-group"> <label for="exampleInputEmail1">Tên dịch vụ</label> <input type="text" class="form-control" id="sername" name="sername" placeholder="Service Name" value="<?php echo $row['ServiceName']; ?>" required="true"> </div>
										<div class="form-group"> <label>Mô tả</label> <input class="form-control" name="des" id="des" rows="5" required="true" value="<?php echo $row['Description']; ?>"> </div>
										<div class="form-group"> <label for="exampleInputPassword1">Giá</label> <input type="text" id="cost" name="cost" class="form-control" placeholder="Cost" value="<?php echo $row['Cost']; ?>" required="true"> </div>
									<?php } ?>
									<button type="submit" name="submit" class="btn btn-default">Cập nhật</button>
								</form>
							</div>
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