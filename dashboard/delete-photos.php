<?php
require_once "../db/db.php";
require_once 'checker.php';
if(isset($_GET['id'])){
  $id = $_GET['id'];

  $check_photo= "SELECT * FROM photos WHERE id = ?;";
  $stmt = mysqli_stmt_init($conn);
  // check service id
  mysqli_stmt_prepare($stmt, $check_photo);
  mysqli_stmt_bind_param($stmt, "i",  $id);
  mysqli_stmt_execute($stmt);
  $result_check = mysqli_stmt_get_result($stmt);
  if ($result_check->num_rows == 0) {
    $_SESSION['error'] = "Invalid photo id";
      header("Location: photos?invalid-photo-id");
      exit();
  }

    while ($array_result = mysqli_fetch_assoc($result_check)) {
      $fileName = $array_result['file_name'];
      $directory = "../gallery_media/";
      $filepath =  $directory.$fileName;
      if(!unlink($filepath)){
        $_SESSION['error'] = "Delete failed";
        header("Location: photos?delete-failed");
        exit();
      }
          $check_service = "DELETE FROM photos WHERE id = ?;";
          $stmt = mysqli_stmt_init($conn);
          // check service id
          mysqli_stmt_prepare($stmt, $check_service);
          mysqli_stmt_bind_param($stmt, "i",  $id);
          if (!mysqli_stmt_execute($stmt)) {
            $_SESSION['error'] = "Delete failed";
            header("Location: photos?delete-error");
            exit();
          }

    }
    $_SESSION['success'] = "Delete success";
    header("Location: photos?delete-success");
    exit();




}else {
  $_SESSION['error'] = "Data emty";
  header("Location: photos?files-not-supplemented-properly");
  exit();
}
