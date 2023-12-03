<?php
require_once '../db/db.php';
unset($_SESSION['session_id_xxx']);
unset($_SESSION['username_id_xxx']);
header("Location: ../login");
exit();

 ?>
