<?php
require_once "../db/db.php";
require_once 'checker.php';
date_default_timezone_set("Asia/Manila");
$date123 = date('Y-m-d H-i-s');
if(isset($_POST['title']) && isset($_POST['description']) && isset($_POST['price']) && isset($_FILES['cover-image'])){
  $title = htmlspecialchars($_POST['title']);
  $desc = htmlspecialchars($_POST['description']);
  $price = htmlspecialchars($_POST['price']);
  $image = $_FILES['cover-image'];

  if(empty($title) || empty($price) || empty($desc)){
    $_SESSION['error'] = "Empty";
    header("Location: services?Fields-Empty!");
    exit();
  }
  if (strlen($title) > 100 || strlen($price) > 100 || strlen($desc) > 500) {
    $_SESSION['error'] = "Limit exceeded";
    header("Location: services?Field-limit-exceeded!");
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
            $_SESSION['error'] = "Cannot read your image";
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
    $_SESSION['error'] = $errorImageMessage;
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
    $_SESSION['error'] = "Extension is not allowed. Please follow the format.";
    header("Location: services?extension-not-allowed");
    exit();
  }
  if ($fileError != 0) {
    $_SESSION['error'] = "File has an error.";
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
    $_SESSION['error'] = "Name already exist.";
    header("Location: services?name-exist");
    exit();
  }

  if(!move_uploaded_file($fileTmpName, $fileDestination)){
    $_SESSION['error'] = "Cannot upload your file. Please try again.";
    header("Location: services?cannot-upload-file");
    exit();
  }

  // Upload data to db
  $add_service = "INSERT INTO services(service_title, service_desc, service_price, date_created) VALUES(?,?,?,?);";
  $add_file = "INSERT INTO services_media(service_id, file_name, file_extension, file_directory, date_added, is_cover) VALUES(?,?,?,?,?,?);";
  $stmt = mysqli_stmt_init($conn);
  // data
  mysqli_stmt_prepare($stmt, $add_service);
  mysqli_stmt_bind_param($stmt, "ssss",  $title, $desc, $price, $date123);
  if (!mysqli_stmt_execute($stmt)) {
    $_SESSION['error'] = "Failed to add your data.";
    header("Location: services?error-adding-to-services");
    exit();
  }
  $id = $conn->insert_id;
  // file
  $is_cover = 'yes';
  mysqli_stmt_prepare($stmt, $add_file);
  mysqli_stmt_bind_param($stmt, "ssssss",  $id, $fileNameNew, $fileActualExt, $directory, $date123, $is_cover);
  if (!mysqli_stmt_execute($stmt)) {
    $_SESSION['error'] = "Failed to add your service.";
    header("Location: services?error-adding-image-data");
    exit();
  }
  $conn->close();
  $_SESSION['success'] = "Upload success";
  header("Location: services?success");
  exit();


}else {
  $_SESSION['error'] = "Data missing";
  header("Location: services?error1");
}
