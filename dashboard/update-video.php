<?php
require_once "../db/db.php";
require_once 'checker.php';
require_once 'checker.php';
date_default_timezone_set("Asia/Manila");
$date123 = date('Y-m-d H-i-s');
if(isset($_GET['id']) && isset($_POST['title']) && isset($_FILES['video'])){
  $id = $_GET['id'];
  $title = htmlspecialchars($_POST['title']);
  $video= $_FILES['video'];

  if(empty($title)){
    $_SESSION['error'] = "Empty fields";
    header("Location: videos?Fields-Empty!");
    exit();
  }
  if (strlen($title) > 100) {
    $_SESSION['error'] = "Field limit exceeded";
    header("Location: videos?Field-limit-exceeded!");
    exit();
  }
  $check_video = "SELECT * FROM videos WHERE id = ?;";
  $stmt = mysqli_stmt_init($conn);
  // check video id
  mysqli_stmt_prepare($stmt, $check_video);
  mysqli_stmt_bind_param($stmt, "i",  $id);
  mysqli_stmt_execute($stmt);
  $result_check = mysqli_stmt_get_result($stmt);
  if ($result_check->num_rows == 0) {
    $_SESSION['error'] = "Invalid id";
      header("Location: videos?invalid-video-id");
      exit();
  }
  //check video id
  if ($video['size'] > 0)
  {
    $fileName = $video['name'];
    $fileTmpName = $video['tmp_name'];
    $fileSize = $video['size'];
    $fileError = $video['error'];
    $fileType = $video['type'];

    $fileActualExt = strtolower(pathinfo($fileName, PATHINFO_EXTENSION));
    $hashed = md5($date123);
    $allowed = array('mp4', 'mov', 'wmv', 'webm', 'mkv','avi');
    if($fileSize == 0) {
      $_SESSION['error'] = "Empty file";
      header("Location: videos?empty-file");
      exit();
    }
    if (!in_array($fileActualExt, $allowed)) {
      $_SESSION['error'] = "Extension not allowed";
      header("Location: videos?extension-not-allowed");
      exit();
    }
    if ($fileError != 0) {
      $_SESSION['error'] = "File has an error";
      header("Location: videos?error");
      exit();
    }
    if ($fileSize >= 100000000) {
      $_SESSION['error'] = "File size limit exceeded";
      header("Location: videos?size-limit");
      exit();
    }
    $fileNameNew = "video_media_".$hashed.".".$fileActualExt;
    $directory = "../gallery_media/";
    $fileDestination =  $directory.$fileNameNew;
    if(file_exists($fileDestination)){
      $_SESSION['error'] = "Name already exist";
      header("Location: videos?name-exist");
      exit();
    }

    if(!move_uploaded_file($fileTmpName, $fileDestination)){
      $_SESSION['error'] = "Upload Failed";
      header("Location: videos?cannot-upload-file");
      exit();
    }
    // Upload data to db
    $update_file = "UPDATE videos SET file_name =?, file_extension=?, file_directory=?, title =? WHERE id = ?;";
    $stmt = mysqli_stmt_init($conn);
    mysqli_stmt_prepare($stmt, $update_file);
    mysqli_stmt_bind_param($stmt, "ssssi", $fileNameNew, $fileActualExt, $directory, $title, $id);
    mysqli_stmt_execute($stmt);
    if (!mysqli_stmt_execute($stmt)) {
      $_SESSION['error'] = "Update Failed";
      header("Location: videos?update-failed");
      exit();
    }
    while ($array_result = mysqli_fetch_assoc($result_check)) {
      $fileName = $array_result['file_name'];
      $directory = "../gallery_media/";
      $filepath =  $directory.$fileName;
      if(!unlink($filepath)){
        $_SESSION['error'] = "Update failed";
        header("Location: videos?update-failed");
        exit();
      }
    }
    $_SESSION['success'] = "Update success";
    header("Location: videos?update-failed");
    exit();

  }
  $update_video = "UPDATE videos SET title = ? WHERE id = ?;";
  $stmt = mysqli_stmt_init($conn);
  // data
  mysqli_stmt_prepare($stmt, $update_video);
  mysqli_stmt_bind_param($stmt, "si",  $title, $id);
  if (!mysqli_stmt_execute($stmt)) {
    $_SESSION['error'] = "Update Failed";
    header("Location: videos?update-failed");
    exit();
  }
  $_SESSION['success'] = "Update success";
  header("Location: videos?update-success");
  exit();



}else {
  $_SESSION['error'] = "Data is empty";
  header("Location: videos?files-not-supplemented-properly");
  exit();
}
