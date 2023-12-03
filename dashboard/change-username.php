<?php
require_once "../db/db.php";
require_once 'checker.php';
$old_username = $username;
if(isset($_POST['username'])){
  $new_username = strtolower($_POST['username']);

  if(empty($new_username) || !preg_match('/^\w+$/', $new_username)){
    $_SESSION['error'] = "Invalid username";
    header("Location: username?invalid-input");
    exit();
  }
  if(strlen($new_username) < 6 || strlen($new_username) > 20){
    $_SESSION['error'] = "Please 6 to 20 characters only";
    header("Location: username?invalid-input-length");
    exit();
  }
  if ($old_username == $new_username) {
    $_SESSION['error'] = "No changes made";
    header("Location: username?no-changes-made");
    exit();
  }
  // Upload data to db
  $check = "SELECT * FROM users WHERE username = ?";
  $stmt = mysqli_stmt_init($conn);
  // data
  mysqli_stmt_prepare($stmt, $check);
  mysqli_stmt_bind_param($stmt, "s",  $new_username);
  if (!mysqli_stmt_execute($stmt)) {
    $_SESSION['error'] = "Checker problem. Try again";
    header("Location: username?checker-problem");
    exit();
  }
  $result_check = mysqli_stmt_get_result($stmt);
  if ($result_check->num_rows > 0) {
    $_SESSION['error'] = "Username already taken";
      header("Location: username?username-taken");
      exit();
  }

  // Upload data to db
  $update = "UPDATE users SET username = ? WHERE username = ?";
  $stmt = mysqli_stmt_init($conn);
  // data
  mysqli_stmt_prepare($stmt, $update);
  mysqli_stmt_bind_param($stmt, "ss",  $new_username, $old_username);
  if (!mysqli_stmt_execute($stmt)) {
    $_SESSION['error'] = "Update failed";
    header("Location: username?update-failed");
    exit();
  }
  $conn->close();
  $_SESSION['username_id_xxx'] = $new_username;
  $_SESSION['success'] = "Update Success";
  header("Location: username?success");
  exit();


}else {
  $_SESSION['error'] = "Incomplete data";
  header("Location: username?error1");
}
