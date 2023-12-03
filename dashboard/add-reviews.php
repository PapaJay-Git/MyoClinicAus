<?php
require_once "../db/db.php";
require_once 'checker.php';
if(isset($_POST['sourceName']) && isset($_POST['description'])){
  $title = htmlspecialchars($_POST['sourceName']);
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
  // Upload data to db
  $add_reviews = "INSERT INTO reviews(source_name, reviews) VALUES(?,?);";
  $stmt = mysqli_stmt_init($conn);
  // data
  mysqli_stmt_prepare($stmt, $add_reviews);
  mysqli_stmt_bind_param($stmt, "ss",  $title, $desc);
  if (!mysqli_stmt_execute($stmt)) {
    $_SESSION['error'] = "Problem adding reviews";
    header("Location: reviews.php?error-adding-to-reviews");
    exit();
  }
  $conn->close();
  $_SESSION['success'] = "Upload success";
  header("Location: reviews.php?success");
  exit();

}else {
  $_SESSION['error'] = "Missing data";
  header("Location: reviews.php?error1");
}
