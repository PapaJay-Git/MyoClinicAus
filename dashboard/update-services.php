<?php
require_once "../db/db.php";
require_once 'checker.php';
require_once 'checker.php';
date_default_timezone_set("Asia/Manila");
$date123 = date('Y-m-d H-i-s');
if(isset($_GET['cover-id']) && isset($_GET['id']) && isset($_POST['title']) && isset($_POST['description']) && isset($_POST['price']) && isset($_FILES['cover'])){
  $id = $_GET['id'];
  $cover_id = $_GET['cover-id'];
  $title = htmlspecialchars($_POST['title']);
  $desc = htmlspecialchars($_POST['description']);
  $price = htmlspecialchars($_POST['price']);
  $image = $_FILES['cover'];

  if(empty($title) || empty($price) || empty($desc)){
    $_SESSION['error'] = "Empty fields";
    header("Location: services?Fields-Empty!");
    exit();
  }
  if (strlen($title) > 100 || strlen($price) > 100 || strlen($desc) > 500) {
    $_SESSION['error'] = "Field limit exceeded";
    header("Location: services?Field-limit-exceeded!");
    exit();
  }
  $check_service = "SELECT * FROM services WHERE id = ?;";
  $check_image = "SELECT * FROM services_media where id = ? AND service_id = ?";
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
  //check service image id
  if ($image['size'] > 0)
  {
    mysqli_stmt_prepare($stmt, $check_image);
    mysqli_stmt_bind_param($stmt, "ii",  $cover_id, $id);
    mysqli_stmt_execute($stmt);
    $result_check_image = mysqli_stmt_get_result($stmt);
    if ($result_check_image->num_rows == 0) {
      $_SESSION['error'] = "Invalid image id";
        header("Location: services?invalid-service-image-id");
        exit();
    }
    //file validation--------------------------------------------
    $errorImageMessage = '';
    $imageIsValid = 'valid';

    $fileName = $image['name'];
    $fileTmpName = $image['tmp_name'];
    $fileSize = $image['size'];
    $fileError = $image['error'];
    $fileType = $image['type'];

  //image validation
      $type = exif_imagetype($fileTmpName);

      if (!getimagesize($fileTmpName)) {
        $_SESSION['error'] = "Invalid image";
        header("Location: services?image-cannot-read");
        exit();
      }
      switch( $type ) {
      case 1: $isimage = @imagecreatefromgif($fileTmpName);
              $imageIsValid = ( !$isimage ) ? "invalid" : "valid";
              $errorImageMessage = ( !$isimage ) ? "GIF extension but Invalid GIF detected" : "Valid GIF detected";
              break;
      case 2: $isimage = @imagecreatefromjpeg($fileTmpName);
              $imageIsValid = ( !$isimage ) ? "invalid" : "valid";
              $errorImageMessage = ( !$isimage ) ? "JPEG extension but Invalid JPEG detected" : "Valid JPEG detected";
              break;
      case 3: $isimage = @imagecreatefrompng($fileTmpName);
              $imageIsValid = ( !$isimage ) ? "invalid" : "valid";
              $errorImageMessage = ( !$isimage ) ? "PNG extension but Invalid PNG detected" : "Valid PNG detected";
              break;
      default:$imageIsValid = "invalid";
              $errorImageMessage = "Your image is invalid. Image need to be the following (GIF, JPEG, PNG)";
      }

    if ($imageIsValid == 'invalid') {
      $_SESSION['error'] = "$errorImageMessage";
      header("Location: services?$errorImageMessage");
      exit();
    }

    $fileActualExt = strtolower(pathinfo($fileName, PATHINFO_EXTENSION));
    $hashed = md5($date123);
    $allowed = array('jpg', 'jpeg', 'png', 'gif');
    if($fileSize == 0) {
      $_SESSION['error'] = "Empty file";
      header("Location: services?empty-file");
      exit();
    }
    if (!in_array($fileActualExt, $allowed)) {
      $_SESSION['error'] = "Extension not allowed";
      header("Location: services?extension-not-allowed");
      exit();
    }
    if ($fileError != 0) {
      $_SESSION['error'] = "File has an error";
      header("Location: services?error");
      exit();
    }
    if ($fileSize >= 30000000) {
      $_SESSION['error'] = "File size limit exceeded";
      header("Location: services?size-limit");
      exit();
    }
    $fileNameNew = "service_media_".$hashed.".".$fileActualExt;
    $directory = "../service_media/";
    $fileDestination =  $directory.$fileNameNew;
    if(file_exists($fileDestination)){
      $_SESSION['error'] = "Name already exist";
      header("Location: services?name-exist");
      exit();
    }

    if(!move_uploaded_file($fileTmpName, $fileDestination)){
      $_SESSION['error'] = "Upload Failed";
      header("Location: services?cannot-upload-file");
      exit();
    }
    // Upload data to db
    $update_file = "UPDATE services_media SET file_name =?, file_extension=?, file_directory=? WHERE id = ? AND service_id =?";
    $stmt = mysqli_stmt_init($conn);

    $is_cover = 'yes';
    mysqli_stmt_prepare($stmt, $update_file);
    mysqli_stmt_bind_param($stmt, "sssii", $fileNameNew, $fileActualExt, $directory, $cover_id, $id);
    mysqli_stmt_execute($stmt);
    if (!mysqli_stmt_execute($stmt)) {
      $_SESSION['error'] = "Update Failed";
      header("Location: services?update-failed");
      exit();
    }
    while ($array_services_result = mysqli_fetch_assoc($result_check_image)) {
      $fileName = $array_services_result['file_name'];
      $filepath =  $directory.$fileName;
      if(!unlink($filepath)){
        $_SESSION['error'] = "Update failed";
        header("Location: services?delete-failed");
        exit();
      }
    }
  }
  $update_service = "UPDATE services SET service_title = ?, service_desc =?, service_price=? WHERE id = ?;";
  $stmt = mysqli_stmt_init($conn);
  // data
  mysqli_stmt_prepare($stmt, $update_service);
  mysqli_stmt_bind_param($stmt, "sssi",  $title, $desc, $price, $id);
  if (!mysqli_stmt_execute($stmt)) {
    $_SESSION['error'] = "Update Failed";
    header("Location: services?update-failed");
    exit();
  }
$_SESSION['success'] = "Update success";
  header("Location: services?update-success");
  exit();



}else {
  $_SESSION['error'] = "Data is empty";
  header("Location: services?files-not-supplemented-properly");
  exit();
}
