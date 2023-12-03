<?php
require_once "db/db.php";
date_default_timezone_set('Asia/Manila');
$date = date('Y-m-d H:i:s');
if (isset($_POST['username']) && isset($_POST['password'])) {
  $inputed_username = $_POST['username'];
  $inputed_password = $_POST['password'];

  $sql = "SELECT * FROM users where username =?";
  $stmt = mysqli_stmt_init($conn);
      mysqli_stmt_prepare($stmt, $sql);
      mysqli_stmt_bind_param($stmt, "s", $inputed_username);
      mysqli_stmt_execute($stmt);
      $result = mysqli_stmt_get_result($stmt);
      if ($result->num_rows > 0) {
        $row = mysqli_fetch_assoc($result);
        $db_password = $row['password'];
        $db_username = $row['username'];
      }else {
        $_SESSION['error'] = "Wrong username or password";
        header("Location: login?wrong-username-or-password");
        exit();
      }
      if(password_verify($inputed_password, $db_password)) {
        $sql = "UPDATE users SET session_id = ? WHERE username =?";
        $stmt = mysqli_stmt_init($conn);
            mysqli_stmt_prepare($stmt, $sql);
            mysqli_stmt_bind_param($stmt, "ss", $date, $db_username);
            mysqli_stmt_execute($stmt);
        $_SESSION['username_id_xxx'] = $db_username;
        $_SESSION['session_id_xxx'] = $date;
        $_SESSION['success'] = "Login success! Welcome on our homepage!";
        header("Location: dashboard/");
        exit();
      }else {
        $_SESSION['error'] = "Wrong username or password";
        header("Location: login?wrong-password");
        exit();
      }
}else{
  $_SESSION['error'] = "Incomplete data!";
  header("Location: login?data-incomplete");
  exit();
}
