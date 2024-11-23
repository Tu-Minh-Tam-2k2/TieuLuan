<?php
session_start();
error_reporting(0);
include('includes/dbconnection.php');
if (strlen($_SESSION['bpmsaid'] == 0)) {
	header('location:logout.php');
} else {
	if ($_GET['action'] == 'delete') {
		$id = intval($_GET['id']);
		$query = mysqli_query($con, "delete from tblservices where ID='$id'");
		if ($query) {
			echo "<script>alert('Đã xóa dịch vụ.');</script>";
			echo "<script>window.location.href='manage-services.php'</script>";
		} else {
			echo "<script>alert('Đã xảy ra lỗi. Vui lòng thử lại.');</script>";
			echo "<script>window.location.href='manage-services.php'</script>";
		}
	}

?>
	<!DOCTYPE HTML>
	<html>

	<head>
		<title>Quản lý dịch vụ</title>
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
					<div class="tables">
						<h3 class="title1">Quản lý dịch vụ</h3>
						<div class="table-responsive bs-example widget-shadow">
							<h4>Cập nhật dịch vụ:</h4>
							<table class="table table-bordered">
								<thead>
									<tr>
										<th>#</th>
										<th>Tên dịch vụ</th>
										<th>Giá dịch vụ</th>
										<th>Ngày tạo</th>
										<th>Trạng thái</th>
									</tr>
								</thead>
								<tbody>
									<?php
									$ret = mysqli_query($con, "select *from  tblservices");
									$cnt = 1;
									while ($row = mysqli_fetch_array($ret)) {
									?>
										<tr>
											<th scope="row"><?php echo $cnt; ?></th>
											<td><?php echo $row['ServiceName']; ?></td>
											<td><?php echo $row['Cost']; ?></td>
											<td><?php echo $row['CreationDate']; ?></td>
											<td><a href="edit-services.php?editid=<?php echo $row['ID']; ?>"><i class="fa fa-edit"></i></a> |
												<a href="manage-services.php?action=delete&&id=<?php echo $row['ID']; ?>"><i class="fa fa-trash-o" aria-hidden="true"></i></a>

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
<?php }  ?>