
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="robots" content="index, follow">
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8">
    <meta name="language" content="English">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="icon" type="image/x-icon" href="../images/logo2.png">
    <link rel="stylesheet"href="https://fonts.googleapis.com/css?family=Rubik">
    <script src="../cdn-files/jquery/jquery-3.5.1.js"></script>
    <link href="../cdn-files/css/bootstrap.min.css" rel="stylesheet">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Anton&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="../style.css">
    <!--Sweetalert for notification-->
   <script type="text/javascript" language="javascript" src="../cdn-files/sweetalert/sweetalert2.all.min.js"></script>
   <script src="../cdn-files/sweetalert/promise/promise.min.js"></script>

</head>
<body >
    <!-- Navigation Bar -->
    <nav class="navbar navbar-expand-lg navbar-dark" id="navigation" >
      <div class="container-fluid ms-xl-5">
      <a class="navbar-brand" href="index" id="com_name">
          <h1 class="d-inline-block align-text-top mt-3"><b><span class="anton-font display-5">MYO CLINIC</span></b></h1><br>
      </a>
      <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>
      <div class="collapse navbar-collapse  justify-content-around ms-xl-5" id="navbarNav">
        <ul class="navbar-nav" >
          <li class="nav-item">
            <a class="nav-link" id="home"  href="index">HOME</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" id="services"  href="services">SERVICES</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" id="photos" href="photos">PHOTOS</a>
          </li>
          <li class="nav-item">
            <a class="nav-link nav" id="videos" href="videos">VIDEOS</a>
          </li>
          <li class="nav-item">
            <a class="nav-link nav" id="reviews-nav" href="reviews">REVIEWS</a>
          </li>
          <li class="nav-item">
            <a class="nav-link nav" id="hours" href="business-hours">BUSINESS HOURS</a>
          </li>
          <li class="nav-item dropdown">
            <a class="nav-link dropdown-toggle" id="account" id="navbarDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
              ACCOUNT SETTINGS
            </a>
            <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
              <b>
              <li><a class="dropdown-item" href="password">PASSWORD</a></li>
              <li><a class="dropdown-item" href="#" onclick="logout()">LOGOUT</a></li>
              </b>
            </ul>
          </li>
        </ul>
      </div>

    </div>

  </nav>

</html>
<?php

require_once 'includes-pop-up.php';
require_once 'logout-pop.php';
 ?>
