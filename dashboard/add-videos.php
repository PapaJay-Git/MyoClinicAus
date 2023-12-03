<?php
require_once "../db/db.php";
require_once 'checker.php';
date_default_timezone_set("Asia/Manila");
$date123 = date('Y-m-d H-i-s');
if(isset($_FILES['video']) && isset($_POST['title'])){
  $image = $_FILES['video'];
  $title = htmlspecialchars($_POST['title']);

  if(empty($title)){
    $_SESSION['error'] = "Empty title";
    header("Location: videos?invalid-input");
    exit();
  }
  if(strlen($title) > 100){
    $_SESSION['error'] = "Please up to 100 characters only";
    header("Location: videos?invalid-input-length");
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

    //video validation
  $mime = mime_content_type($fileTmpName);
  if(!strstr($mime, "video/"))
  {
    $_SESSION['error'] = "File is not a video";
    header("Location: videos?file-is-not-a-valid-video");
    exit();
  }
  $fileActualExt = strtolower(pathinfo($fileName, PATHINFO_EXTENSION));
  $hashed = md5($date123);
  $allowed = array('mp4', 'mov', 'wmv', 'webm', 'mkv','avi');
  if($fileSize == 0) {
    $_SESSION['error'] = "File is empty";
    header("Location: videos?empty-file");
    exit();
  }
  if (!in_array($fileActualExt, $allowed)) {
    $_SESSION['error'] = "Video extension is invalid. Please follow the format";
    header("Location: videos?extension-not-allowed");
    exit();
  }
  if ($fileError != 0) {
    $_SESSION['error'] = "File has an error";
    header("Location: videos?error");
    exit();
  }
  if ($fileSize >= 100000000) {
    $_SESSION['error'] = "Limit exceeded to 100mb.";
    header("Location: videos?size-limit");
    exit();
  }
  $fileNameNew = "gallery_video_".$hashed.".".$fileActualExt;
  $directory = "../gallery_media/";
  $fileDestination =  $directory.$fileNameNew;
  if(file_exists($fileDestination)){
    $_SESSION['error'] = "Name already exist";
    header("Location: videos?name-exist");
    exit();
  }

  if(!move_uploaded_file($fileTmpName, $fileDestination)){
    $_SESSION['error'] = "Cannot upload file";
    header("Location: videos?cannot-upload-file");
    exit();
  }
  // Upload data to db
  $add_video = "INSERT INTO videos(title, file_name, file_extension, file_directory, date_added) VALUES(?,?,?,?,?);";
  $stmt = mysqli_stmt_init($conn);
  // data
  mysqli_stmt_prepare($stmt, $add_video);
  mysqli_stmt_bind_param($stmt, "sssss",  $title, $fileNameNew, $fileActualExt, $directory, $date123);
  if (!mysqli_stmt_execute($stmt)) {
    $_SESSION['error'] = "Failed adding you data";
    header("Location: videos?error-adding-to-videos");
    exit();
  }
  $conn->close();
  $_SESSION['success'] = "Upload success";
  header("Location: videos?success");
  exit();


}else {
    $_SESSION['error'] = "Video is missing";
  header("Location: videos?error");
}
