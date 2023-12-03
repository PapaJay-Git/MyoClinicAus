<?php
require_once 'db/db.php';

if (isset($_SESSION['username_id_xxx']) && isset($_SESSION['session_id_xxx'])) {
  $username = $_SESSION['username_id_xxx'];
  $last_session_id = $_SESSION['session_id_xxx'];
  $sql = "SELECT * FROM users where username =?";
  $stmt = mysqli_stmt_init($conn);
      mysqli_stmt_prepare($stmt, $sql);
      mysqli_stmt_bind_param($stmt, "s", $username);
      mysqli_stmt_execute($stmt);
      $result = mysqli_stmt_get_result($stmt);
      if ($result->num_rows > 0){
        $assoc = mysqli_fetch_assoc($result);
        if ($assoc['session_id'] <> $last_session_id) {
          unset($_SESSION['username_id_xxx']);
          unset($_SESSION['session_id_xxx']);
          exit();
        }else {
          header("location: dashboard/");
          exit();
        }
      }else{
        unset($_SESSION['session_id_xxx']);
        unset($_SESSION['username_id_xxx']);
        exit();
      }
}else {
  unset($_SESSION['session_id_xxx']);
  unset($_SESSION['username_id_xxx']);
  exit();
}
