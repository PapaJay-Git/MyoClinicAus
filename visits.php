<?php
require_once 'db/db.php';

date_default_timezone_set("Asia/Manila");
$date = date('Y-m-d H-i-s');
if (isset($_SESSION['visits'])) {
  $sql = "SELECT * FROM visits where session_visit =?";
  $stmt = mysqli_stmt_init($conn);
      mysqli_stmt_prepare($stmt, $sql);
      mysqli_stmt_bind_param($stmt, "s", $_SESSION['visits']);
      mysqli_stmt_execute($stmt);
      $result = mysqli_stmt_get_result($stmt);
      if ($result->num_rows == 0){
        $sql = "INSERT INTO visits(session_visit) values(?)";
        $stmt = mysqli_stmt_init($conn);
        mysqli_stmt_prepare($stmt, $sql);
        mysqli_stmt_bind_param($stmt, "s", $_SESSION['visits']);
        mysqli_stmt_execute($stmt);
      }
}else {
  $date_hashed = password_hash($date, PASSWORD_DEFAULT);
  $_SESSION['visits'] = $date_hashed;
  $sql = "INSERT INTO visits(session_visit) values(?)";
  $stmt = mysqli_stmt_init($conn);
  mysqli_stmt_prepare($stmt, $sql);
  mysqli_stmt_bind_param($stmt, "s", $_SESSION['visits']);
  mysqli_stmt_execute($stmt);
}
