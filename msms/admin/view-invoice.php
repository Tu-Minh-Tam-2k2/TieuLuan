<?php
session_start();
error_reporting(0);
include('includes/dbconnection.php');
if (strlen($_SESSION['bpmsaid'] == 0)) {
	header('location:logout.php');
} else {
?>
	<!DOCTYPE HTML>
	<html>
	<head>
		<title>Chi tiết hóa đơn</title>
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
					<div class="tables" id="exampl">
						<h3 class="title1">Chi tiết hóa đơn</h3>

						<?php
						$invid = intval($_GET['invoiceid']);
						$ret = mysqli_query($con, "select DISTINCT  tblinvoice.PostingDate,tblcustomers.Name,tblcustomers.Email,tblcustomers.MobileNumber,tblcustomers.Gender
	from  tblinvoice 
	join tblcustomers on tblcustomers.ID=tblinvoice.Userid 
	where tblinvoice.BillingId='$invid'");
						$cnt = 1;
						while ($row = mysqli_fetch_array($ret)) {

						?>

							<div class="table-responsive bs-example widget-shadow">
								<h4>Hóa đơn #<?php echo $invid; ?></h4>
								<table class="table table-bordered" width="100%" border="1">
									<tr>
										<th colspan="6">Chi tiết khách hàng</th>
									</tr>
									<tr>
										<th>Tên</th>
										<td><?php echo $row['Name'] ?></td>
										<th>Số điện thoại</th>
										<td><?php echo $row['MobileNumber'] ?></td>
										<th>Email </th>
										<td><?php echo $row['Email'] ?></td>
									</tr>
									<tr>
										<th>Giới tính</th>
										<td><?php echo $row['Gender'] ?></td>
										<th>Ngày lập hóa đơn</th>
										<td colspan="3"><?php echo $row['PostingDate'] ?></td>
									</tr>
								<?php } ?>
								</table>
								<table class="table table-bordered" width="100%" border="1">
									<tr>
										<th colspan="3">Chi tiết dịch vụ</th>
									</tr>
									<tr>
										<th>STT</th>
										<th>Dịch vụ</th>
										<th>Giá</th>
									</tr>

									<?php
									$ret = mysqli_query($con, "select tblservices.ServiceName,tblservices.Cost  
	from  tblinvoice 
	join tblservices on tblservices.ID=tblinvoice.ServiceId 
	where tblinvoice.BillingId='$invid'");
									$cnt = 1;
									while ($row = mysqli_fetch_array($ret)) {
									?>

										<tr>
											<th><?php echo $cnt; ?></th>
											<td><?php echo $row['ServiceName'] ?></td>
											<td><?php echo $subtotal = $row['Cost'] ?></td>
										</tr>
									<?php
										$cnt = $cnt + 1;
										$gtotal += $subtotal;
									} ?>

									<tr>
										<th colspan="2" style="text-align:center">Tổng tiền</th>
										<th><?php echo $gtotal ?></th>

									</tr>
								</table>
								<p style="margin-top:1%" align="center">
									<i class="fa fa-print fa-2x" style="cursor: pointer;" OnClick="CallPrint(this.value)"></i>
								</p>

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
		<script>
			function CallPrint(strid) {
				var prtContent = document.getElementById("exampl");
				var WinPrint = window.open('', '', 'left=0,top=0,width=800,height=900,toolbar=0,scrollbars=0,status=0');
				WinPrint.document.write(prtContent.innerHTML);
				WinPrint.document.close();
				WinPrint.focus();
				WinPrint.print();
			}
		</script>
	</body>

	</html>
<?php }  ?>