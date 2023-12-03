<?php
require_once "../db/db.php";
require_once 'checker.php';
date_default_timezone_set("Asia/Manila");
$date123 = date('Y-m-d H-i-s');
if(isset($_FILES['image'])){
  $image = $_FILES['image'];
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
            $_SESSION['error'] = "Failed to read image";
            header("Location: photos?image-cannot-read");
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
    header("Location: photos?$errorImageMessage");
    exit();
  }
  $fileActualExt = strtolower(pathinfo($fileName, PATHINFO_EXTENSION));
  $hashed = md5($date123);
  $allowed = array('jpg', 'jpeg', 'png', 'gif');
  if($fileSize == 0) {
    $_SESSION['error'] = "Empty file";
    header("Location: photos?empty-file");
    exit();
  }
  if (!in_array($fileActualExt, $allowed)) {
    $_SESSION['error'] = "Only allowed extensions are jpg, jpeg, png, and gif.";
    header("Location: photos?extension-not-allowed");
    exit();
  }
  if ($fileError != 0) {
    $_SESSION['error'] = "File has an error";
    header("Location: photos?error");
    exit();
  }
  if ($fileSize >= 30000000) {
    $_SESSION['error'] = "Limit is only 25mb";
    header("Location: photos?size-limit");
    exit();
  }
  $fileNameNew = "gallery_photo_".$hashed.".".$fileActualExt;
  $directory = "../gallery_media/";
  $fileDestination =  $directory.$fileNameNew;
  if(file_exists($fileDestination)){
    $_SESSION['error'] = "Name already exist";
    header("Location: photos?name-exist");
    exit();
  }

  if(!move_uploaded_file($fileTmpName, $fileDestination)){
    $_SESSION['error'] = "Upload failed";
    header("Location: photos?cannot-upload-file");
    exit();
  }
  // Upload data to db
  $add_photo = "INSERT INTO photos(file_name, file_extension, file_directory, date_added) VALUES(?,?,?,?);";
  $stmt = mysqli_stmt_init($conn);
  // data
  mysqli_stmt_prepare($stmt, $add_photo);
  mysqli_stmt_bind_param($stmt, "ssss",  $fileNameNew, $fileActualExt, $directory, $date123);
  if (!mysqli_stmt_execute($stmt)) {
    $_SESSION['error'] = "Failed adding data";
    header("Location: photos?error-adding-to-photos");
    exit();
  }
  $conn->close();
  $_SESSION['success'] = "Add success";
  header("Location: photos?success");
  exit();


}else {
  $_SESSION['error'] = "Data not complete";
  header("Location: photos?error1");
}
