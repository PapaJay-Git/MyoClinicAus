<?php
require_once "../db/db.php";
require_once 'checker.php';
$valid_time = ['6:00 AM', '7:00 AM','8:00 AM','9:00 AM','10:00 AM','11:00 AM','12:00 PM', '1:00 PM', '2:00 PM','3:00 PM','4:00 PM','5:00 PM','6:00 PM','7:00 PM','8:00 PM', '9:00 PM'];
if(isset($_POST['id'], $_POST['schedule_start'], $_POST['schedule_end'], $_POST['status1'], $_POST['status2'], $_POST['status3'], $_POST['status4'], $_POST['status5'], $_POST['status6'], $_POST['status0'])) {
  $id= $_POST['id'];
  $start = $_POST['schedule_start'];
  $end = $_POST['schedule_end'];
  $status0 = $_POST['status0'];
  $status1 = $_POST['status1'];
  $status2 = $_POST['status2'];
  $status3 = $_POST['status3'];
  $status4 = $_POST['status4'];
  $status5 = $_POST['status5'];
  $status6 = $_POST['status6'];

if (count($id) <> 7 || count($start) <> 7 || count($end) <> 7) {
  header("Location: business-hours.php?not-enough-data");
  exit();
}
$a = 0;
while ( $a < 7) {
  if (${'status' . $a} <> 'OPEN') {
    ${'status' . $a} = 'CLOSED';
  }
  if (!in_array($start[$a], $valid_time) || !in_array($end[$a], $valid_time)) {
    $_SESSION['error'] = "Invalid Time";
    header("Location: business-hours.php?invalid-time");
    exit();
  }
  $check_testimony = "SELECT * FROM business_hours WHERE id = ?;";
  $stmt = mysqli_stmt_init($conn);
  // check service id
  mysqli_stmt_prepare($stmt, $check_testimony);
  mysqli_stmt_bind_param($stmt, "s",  $id[$a]);
  mysqli_stmt_execute($stmt);
  $result_check = mysqli_stmt_get_result($stmt);
  if ($result_check->num_rows == 0) {
    $_SESSION['error'] = "Invalid id";
    header("Location: business-hours.php?invalid-id");
    exit();
  }
    // Upload data to db
    $update_file = "UPDATE business_hours SET schedule_start=?, schedule_end=? , status=? WHERE id = ?";
    $stmt = mysqli_stmt_init($conn);
    mysqli_stmt_prepare($stmt, $update_file);
    mysqli_stmt_bind_param($stmt, "sssi", $start[$a], $end[$a], ${"status" . $a}, $id[$a]);
    mysqli_stmt_execute($stmt);
    if (!mysqli_stmt_execute($stmt)) {
      $_SESSION['error'] = "Update Failed";
      header("Location: business-hours.php?update-failed");
      exit();
    }

  $a++;
}
$_SESSION['success'] = "Update success";
header("Location: business-hours.php?update-success");
exit();

}else {
  $_SESSION['error'] = "Update empty";
  header("Location: business-hours.php?files-not-supplemented-properly");
  exit();
}
