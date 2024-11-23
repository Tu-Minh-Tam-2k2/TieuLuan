<?php
session_start();
error_reporting(0);
include('includes/dbconnection.php');
if (strlen($_SESSION['bpmsaid'] == 0)) {
	header('location:logout.php');
} else {

	// Code for deletion
	if ($_GET['action'] == 'delete') {
		$id = intval($_GET['id']);
		$query = mysqli_query($con, "delete from tblsubscriber where ID='$id'");
		if ($query) {
			echo "<script>alert('xóa người đăng ký.');</script>";
			echo "<script>window.location.href='subcriber.php'</script>";
		} else {
			echo "<script>alert('Something Went Wrong. Please try again.');</script>";
			echo "<script>window.location.href='subcriber.php'</script>";
		}
	}


?>
	<!DOCTYPE HTML>
	<html>

	<head>
		<title>Người đăng ký</title>
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
		<!--//end-animate-->
		<!-- Metis Menu -->
		<script src="js/metisMenu.min.js"></script>
		<script src="js/custom.js"></script>
		<link href="css/custom.css" rel="stylesheet">
		<!--//Metis Menu -->
	</head>

	<body class="cbp-spmenu-push">
		<div class="main-content">
			<!--left-fixed -navigation-->
			<?php include_once('includes/sidebar.php'); ?>
			<!--left-fixed -navigation-->
			<!-- header-starts -->
			<?php include_once('includes/header.php'); ?>
			<!-- //header-ends -->
			<!-- main content start-->
			<div id="page-wrapper">
				<div class="main-page">
					<div class="tables">
						<h3 class="title1">Người đăng ký</h3>



						<div class="table-responsive bs-example widget-shadow">
							<h4>Xem Email người đăng ký:</h4>
							<table class="table table-bordered">
								<thead>
									<tr>
										<th>#</th>
										<th>Email</th>
										<th>Ngày đăng ký</th>
										<th>Tùy chỉnh</th>
									</tr>
								</thead>
								<tbody>
									<?php
									$ret = mysqli_query($con, "select *from   tblsubscriber");
									$cnt = 1;
									while ($row = mysqli_fetch_array($ret)) {

									?>

										<tr>
											<th scope="row"><?php echo $cnt; ?></th>
											<td><?php echo $row['Email']; ?></td>
											<td><?php echo $row['DateofSub']; ?></td>
											<td>
												<a href="subcriber.php?action=delete&&id=<?php echo $row['ID']; ?>" class="btn btn-danger">Delete</a>
											</td>
										</tr> <?php
												$cnt = $cnt + 1;
											} ?>
								</tbody>
							</table>
						</div>
					</div>
				</div>
			</div>
			<!--footer-->
			<?php include_once('includes/footer.php'); ?>
			<!--//footer-->
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
		<!--scrolling js-->
		<script src="js/jquery.nicescroll.js"></script>
		<script src="js/scripts.js"></script>
		<!--//scrolling js-->
		<!-- Bootstrap Core JavaScript -->
		<script src="js/bootstrap.js"> </script>
	</body>

	</html>
<?php }  ?>