<?php
require_once "../db/db.php";
require_once 'checker.php';
if(isset($_GET['id'])){
  $id = $_GET['id'];
  $check_reviews= "SELECT * FROM reviews WHERE id = ?;";
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

          $check_reviews = "DELETE FROM reviews WHERE id = ?;";
          $stmt = mysqli_stmt_init($conn);
          // check service id
          mysqli_stmt_prepare($stmt, $check_reviews);
          mysqli_stmt_bind_param($stmt, "i",  $id);
          if (!mysqli_stmt_execute($stmt)) {
            $_SESSION['error'] = "Delete Failed";
            header("Location: reviews.php?delete-error");
            exit();
          }
          $_SESSION['success'] = "Delete success";
          header("Location: reviews.php?delete-success");
          exit();
}else{
  $_SESSION['error'] = "Data is empty";
  header("Location: reviews.php?delete-failed");
  exit();
}
