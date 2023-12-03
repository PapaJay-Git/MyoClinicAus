<?php
require_once 'db/db.php';
require_once 'visits.php';
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
        }else {
          header("location: dashboard/services");
          exit();
        }
      }else{
        unset($_SESSION['session_id_xxx']);
        unset($_SESSION['username_id_xxx']);
      }
}else {
  unset($_SESSION['session_id_xxx']);
  unset($_SESSION['username_id_xxx']);
}

 ?>
 <!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta name="robots" content="index, follow">
  <meta http-equiv="Content-Type" content="text/html; charset=utf-8">
  <meta name="language" content="English">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <title>LOGIN - MYO CLINIC</title>
  <link rel='canonical' href='https://myoclinicgc.com.au/login'>
  <meta property='og:title' content='LOGIN - MYO CLINIC'>
  <meta property='og:site_name' content='MYO CLINIC'>
  <meta property='og:url' content='https://myoclinicgc.com.au/login'>
  <meta property='og:description' content='MYO Clinic specialized in skin care treatment that will surely result in a glowing beauty.'>
  <meta property='og:type' content='article'>
  <meta property='og:image' content='https://myoclinicgc.com.au/images/myo%20clinic/img4.webp'>
  <meta name='twitter:card' content='summary_large_image'>
  <meta name='twitter:site' content='https://myoclinicgc.com.au/login'>
  <meta name='twitter:title' content='LOGIN - MYO CLINIC'>
  <meta name='twitter:description' content='MYO Clinic specialized in skin care treatment that will surely result in a glowing beauty.'>
  <meta name='twitter:image' content='https://myoclinicgc.com.au/images/myo%20clinic/img4.webp'>
  <link rel="icon" type="image/x-icon" href="images/logo2.png">
  <link rel="stylesheet"href="https://fonts.googleapis.com/css?family=Rubik">
  <script src="https://code.jquery.com/jquery-3.6.0.min.js" integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4=" crossorigin="anonymous"></script>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
  <link rel="preconnect" href="https://fonts.googleapis.com">
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
  <link href="https://fonts.googleapis.com/css2?family=Anton&display=swap" rel="stylesheet">
  <link rel="stylesheet" href="style.css">
  <!--Sweetalert for notification-->
 <script type="text/javascript" language="javascript" src="cdn-files/sweetalert/sweetalert2.all.min.js"></script>
 <script src="cdn-files/sweetalert/promise/promise.min.js"></script>
</head>
<body>
  <!-- Navigation Bar -->
  <nav class="navbar navbar-expand-lg navbar-dark fixed-top " id="navigation" >
    <div class="container-fluid ms-xl-5">
    <a class="navbar-brand" href="index" id="com_name">
        <h1 class="d-inline-block align-text-top mt-3"><b><span class="anton-font display-5">MYO CLINIC</span></b>
          <br><span class="sub-title-logo " style="font-size: 15px; margin-top: -20px;">BEHOLD BEAUTY WITHIN</span></h1>
    </a>
  </div>
</nav>
<div class="container-fluid" style="margin-top:250px">
  <div class="container d-flex justify-content-center" >
      <div class="col-lg-5 col-md-8 col-sm-12 col-12 shadow-lg rounded">
        <div class="card border-0 p-5" style="width: 100%; height:100%;">
          <div class="text-center mb-3">

            <h1 class="anton-font">WELCOME</h1>
            <small>Please provide us your account info</small>
          </div>
          <form action="login-query" method="post">
            <small for="username">Username</small>
            <input class="form-control mb-3" type="text" id="username" name="username" placeholder="Type your username">
            <small for="password">Password</small>
            <input class="form-control mb-5" type="password" id="password" name="password" placeholder="Type your password">
            <button type="submit" id="view-more-blue" style="width:100%" name="button">LOGIN</button>
          </form>
        </div>
    </div>
  </div>
</div>
     </body>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
</html>
<?php
if (isset($_SESSION['Notify']) ) {
  if( isset( $_SESSION['error']) ) {
    ?>
        <script>
        swal.fire({position: 'center', icon: 'warning', title:'WARNING', text: '<?php echo $_SESSION['error']; ?>', showConfirmButton: true, timer: 10000});
        </script>
        <?php
        unset($_SESSION['error']);
        unset($_SESSION['notify']);
  }
}


//Error pop ups
if( isset( $_SESSION['error'] ) ) {
 ?>
  <script>
      swal.fire({position: 'center', icon: 'warning', title:'WARNING', text: '<?php echo $_SESSION['error']; ?>', showConfirmButton: true, timer: 10000});
  </script>
  <?php
} unset($_SESSION['error']);
