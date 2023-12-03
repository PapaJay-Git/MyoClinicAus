<?php
require_once "../db/db.php";
require_once 'checker.php';
date_default_timezone_set("Asia/Manila");
$date123 = date('Y-m-d H-i-s');
if(isset($_GET['id'])){
  $id = $_GET['id'];

  $check_service = "SELECT * FROM services WHERE id = ?;";
  $check_image = "SELECT * FROM services_media where service_id = ?";
  $stmt = mysqli_stmt_init($conn);
  // check service id
  mysqli_stmt_prepare($stmt, $check_service);
  mysqli_stmt_bind_param($stmt, "i",  $id);
  mysqli_stmt_execute($stmt);
  $result_check = mysqli_stmt_get_result($stmt);
  if ($result_check->num_rows == 0) {
      $_SESSION['error'] = "Invalid id";
      header("Location: services?invalid-service-id");
      exit();
  }

    mysqli_stmt_prepare($stmt, $check_image);
    mysqli_stmt_bind_param($stmt, "i",  $id);
    mysqli_stmt_execute($stmt);
    $result_check_image = mysqli_stmt_get_result($stmt);
    if ($result_check_image->num_rows > 0) {
          while ($array_services_result = mysqli_fetch_assoc($result_check_image)) {
            $delete_image = "DELETE FROM services_media where service_id = ?";
            mysqli_stmt_prepare($stmt, $delete_image);
            mysqli_stmt_bind_param($stmt, "i",  $id);
            if(!mysqli_stmt_execute($stmt)){
              $_SESSION['error'] = "Delete failed";
              header("Location: services?delete-failed");
              exit();
            }
            $fileName = $array_services_result['file_name'];
            $directory = "../service_media/";
            $filepath =  $directory.$fileName;
            if(!unlink($filepath)){
              $_SESSION['error'] = "Delete failed";
              header("Location: services?delete-failed");
              exit();
            }
          }
    }
    $check_service = "DELETE FROM services WHERE id = ?;";
    $stmt = mysqli_stmt_init($conn);
    // check service id
    mysqli_stmt_prepare($stmt, $check_service);
    mysqli_stmt_bind_param($stmt, "i",  $id);
    if (!mysqli_stmt_execute($stmt)) {
      $_SESSION['error'] = "Delete Failed";
      header("Location: services?delete-error");
      exit();
    }
    $_SESSION['success'] = "Delete success";
    header("Location: services?delete-success");
    exit();



}else {
  $_SESSION['error'] = "Data is empty";
  header("Location: services?files-not-supplemented-properly");
  exit();
}
