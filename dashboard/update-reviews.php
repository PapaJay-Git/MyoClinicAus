<?php
require_once "../db/db.php";
require_once 'checker.php';
if( isset($_GET['id']) && isset($_POST['title']) && isset($_POST['description'])){
  $id= $_GET['id'];
  $title = htmlspecialchars($_POST['title']);
  $desc = htmlspecialchars($_POST['description']);

  if(empty($title) || empty($desc)){
    $_SESSION['error'] = "Empty fields";
    header("Location: reviews.php?Fields-Empty!");
    exit();
  }
  if (strlen($title) > 100 || strlen($desc) > 500) {
    $_SESSION['error'] = "Field limit exceeded";
    header("Location: reviews.php?Field-limit-exceeded!");
    exit();
  }
  $check_reviews = "SELECT * FROM reviews WHERE id = ?;";
  $stmt = mysqli_stmt_init($conn);
  // check service id
  mysqli_stmt_prepare($stmt, $check_reviews);
  mysqli_stmt_bind_param($stmt, "i",  $id);
  mysqli_stmt_execute($stmt);
  $result_check = mysqli_stmt_get_result($stmt);
  if ($result_check->num_rows == 0) {
    $_SESSION['error'] = "Invalid id";
      header("Location: reviews.php?invalid-reviews-id");
      exit();
  }
    // Upload data to db
    $update_file = "UPDATE reviews SET source_name=?, reviews=? WHERE id = ?";
    $stmt = mysqli_stmt_init($conn);

    mysqli_stmt_prepare($stmt, $update_file);
    mysqli_stmt_bind_param($stmt, "ssi", $title, $desc,$id);
    mysqli_stmt_execute($stmt);
    if (!mysqli_stmt_execute($stmt)) {
      $_SESSION['error'] = "Update Failed";
      header("Location: reviews.php?update-failed");
      exit();
    }
    $_SESSION['success'] = "Update success";
  header("Location: reviews.php?update-success");
  exit();

}else {
  $_SESSION['error'] = "Data is empty";
  header("Location: reviews.php?files-not-supplemented-properly");
  exit();
}
