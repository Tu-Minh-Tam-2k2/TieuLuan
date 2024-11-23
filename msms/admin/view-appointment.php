<?php
session_start();
error_reporting(0);
include('includes/dbconnection.php');
if (strlen($_SESSION['bpmsaid'] == 0)) {
  header('location:logout.php');
} else {

  if (isset($_POST['submit'])) {

    $cid = $_GET['viewid'];
    $remark = $_POST['remark'];
    $status = $_POST['status'];



    $query = mysqli_query($con, "update  tblappointment set Remark='$remark',Status='$status' where ID='$cid'");
    if ($query) {

      echo '<script>alert("cập nhật thành công")</script>';
    } else {
      echo '<script>alert("Something Went Wrong. Please try again.")</script>';
    }
  }


?>
  <!DOCTYPE HTML>
  <html>

  <head>
    <title>Xem cuộc hẹn</title>
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
            <h3 class="title1">Xem cuộc hẹn</h3>
            <div class="table-responsive bs-example widget-shadow">
              <p style="font-size:16px; color:red" align="center"> <?php if ($msg) {
                                                                      echo $msg;
                                                                    }  ?> </p>
              <h4>Xem cuộc hẹn:</h4>
              <?php
              $cid = $_GET['viewid'];
              $ret = mysqli_query($con, "select * from tblappointment where ID='$cid'");
              $cnt = 1;
              while ($row = mysqli_fetch_array($ret)) {

              ?>
                <table class="table table-bordered">
                  <tr>
                    <th>Mã số cuộc hẹn</th>
                    <td><?php echo $row['AptNumber']; ?></td>
                  </tr>
                  <tr>
                    <th>Tên</th>
                    <td><?php echo $row['Name']; ?></td>
                  </tr>

                  <tr>
                    <th>Email</th>
                    <td><?php echo $row['Email']; ?></td>
                  </tr>
                  <tr>
                    <th>Số điện thoại</th>
                    <td><?php echo $row['PhoneNumber']; ?></td>
                  </tr>
                  <tr>
                    <th>Ngày hẹn</th>
                    <td><?php echo $row['AptDate']; ?></td>
                  </tr>

                  <tr>
                    <th>Thời gian hẹn</th>
                    <td><?php echo $row['AptTime']; ?></td>
                  </tr>

                  <tr>
                    <th>Dịch vụ</th>
                    <td><?php echo $row['Services']; ?></td>
                  </tr>
                  <tr>
                    <th>Ngày áp dụng</th>
                    <td><?php echo $row['ApplyDate']; ?></td>
                  </tr>
                  <tr>
                    <th>Trạng thái</th>
                    <td> <?php
                          if ($row['Status'] == "1") {
                            echo "Selected";
                          }

                          if ($row['Status'] == "2") {
                            echo "Rejected";
                          }; ?></td>
                  </tr>
                </table>
                <table class="table table-bordered">
                  <?php if ($row['Remark'] == "") { ?>


                    <form name="submit" method="post" enctype="multipart/form-data">

                      <tr>
                        <th>Ghi chú :</th>
                        <td>
                          <textarea name="remark" placeholder="" rows="5" cols="14" class="form-control wd-450" required="true"></textarea>
                        </td>
                      </tr>

                      <tr>
                        <th>Status :</th>
                        <td>
                          <select name="status" class="form-control wd-450" required="true">
                            <option value="1" selected="true">Chấp nhận</option>
                            <option value="2">Từ chối</option>
                          </select>
                        </td>
                      </tr>

                      <tr align="center">
                        <td colspan="2"><button type="submit" name="submit" class="btn btn-az-primary pd-x-20">Submit</button></td>
                      </tr>
                    </form>
                  <?php } else { ?>
                </table>
                <table class="table table-bordered">
                  <tr>
                    <th>Nhận xét</th>
                    <td><?php echo $row['Remark']; ?></td>
                  </tr>


                  <tr>
                    <th>Ngày nhận xét</th>
                    <td><?php echo $row['RemarkDate']; ?> </td>
                  </tr>

                </table>
              <?php } ?>
            <?php } ?>
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
    <!--scrolling js-->
    <script src="js/jquery.nicescroll.js"></script>
    <script src="js/scripts.js"></script>
    <!--//scrolling js-->
    <!-- Bootstrap Core JavaScript -->
    <script src="js/bootstrap.js"> </script>
  </body>

  </html>
<?php }  ?>