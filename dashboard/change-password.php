<?php
require_once "../db/db.php";
require_once 'checker.php';
$_SESSION['error'] = "";

// $new_password = '';
// echo password_hash($new_password, PASSWORD_DEFAULT);
if(isset($_POST['new_password']) && isset($_POST['confirm_new_password']) && isset($_POST['old_password'])){
  $new_password = $_POST['new_password'];
  $confirm_new_password = $_POST['confirm_new_password'];
  $old_password_from_user = $_POST['old_password'];


  if ($new_password <> $confirm_new_password ) {
    $_SESSION['error'] = "New password did not match";
    header("Location: password?new-password-did-not-match");
    exit();
  }
  if(empty($new_password) || !preg_match("/^\w+$/", $new_password) || empty($confirm_new_password) || !preg_match('/^\w+$/', $confirm_new_password)){
    $_SESSION['error'] = "Only letters (either case), numbers, and the underscore; 6 to 20 characters.";
    header("Location: password?invalid=password1");
    exit();
  }

  if(strlen($new_password) < 6 || strlen($new_password) > 20 || strlen($confirm_new_password) < 6 || strlen($confirm_new_password) > 20){
    $_SESSION['error'] = "New password length. Please 6 to 20 characters only.";
    header("Location: password?invalid-input-length");
    exit();
  }
  // Upload data to db
  $check = "SELECT password FROM users WHERE username = ?";
  $stmt = mysqli_stmt_init($conn);
  // data
  mysqli_stmt_prepare($stmt, $check);
  mysqli_stmt_bind_param($stmt, "s",  $username);
  if (!mysqli_stmt_execute($stmt)) {
    $_SESSION['error'] = "Checker problem(server)";
    header("Location: password?checker-problem");
    exit();
  }
  $result_check = mysqli_stmt_get_result($stmt);
  if ($result_check->num_rows == 0) {
      $_SESSION['error'] = "Account not found";
      header("Location: password?not-found");
      exit();
  }
  $dbpassword_retrieved = mysqli_fetch_assoc($result_check);
  $old_password_from_db = $dbpassword_retrieved['password'];
  if(!password_verify($old_password_from_user, $old_password_from_db)) {
    $_SESSION['error'] = "Wrong old password";
    header("Location: password?wrong-old-password");
    exit();
  }
 $hashed_password = password_hash($new_password, PASSWORD_DEFAULT);
  // Upload data to db
  $update = "UPDATE users SET password = ? WHERE username = ?";
  $stmt = mysqli_stmt_init($conn);
  // data
  mysqli_stmt_prepare($stmt, $update);
  mysqli_stmt_bind_param($stmt, "ss",  $hashed_password, $username);
  if (!mysqli_stmt_execute($stmt)) {
    $_SESSION['error'] = "Update failed";
    header("Location: password?update-failed");
    exit();
  }
  $conn->close();
  $_SESSION['success'] = "Update Success";
  header("Location: password?success");
  exit();


}else {
  $_SESSION['error'] = "Incomplete data";
  header("Location: password?error1");
}
