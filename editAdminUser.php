<?php
// to display errors helpful during development
error_reporting(E_ALL);
ini_set("display_errors", "1");
// initialize session on all pages requiring knowledge if user is logged in or not

if (isset($_SESSION["admin"])) {

}else{
  "<script type='text/javascript'> alert('Sign in as admin.');
   location='../signInScreen.php';
   </script>";
};
?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8" />
  <meta http-equiv="X-UA-Compatible" content="IE=edge" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>Play Therapy</title>
  <!--  favicon -->
  <link rel="icon" type="image/x-icon" href="images/favi2_L5I_icon.ico" />
  <!--  Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
  <!--  Font Awesome -->
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.13.0/css/all.min.css" integrity="sha256-h20CPZ0QyXlBuAw7A+KluUYx/3pK+c7lYEpqLTlxjYQ=" crossorigin="anonymous" />
  <!--  Google Fonts -->
  <link rel="preconnect" href="https://fonts.gstatic.com" />
  <link href="https://fonts.googleapis.com/css2?family=Noto+Sans:wght@400;700&display=swap" rel="stylesheet" />
  <!--  CSS -->
  <link rel="stylesheet" href="css/styles.css" />
</head>
<body id="adminBody">
  <!--  Header code inserted below-->
  <div class="fixed-top">
    <nav class="navbar navbar-expand-lg" id= "navbarAdmin" >
      <a class="navbar-brand" href="admin.php"><img id="playLogo" src="images/logo.png" alt="playLogo" width="170" height="100" /><span>PLAY THERAPY TOYS <b>by Lenka De Villiers-Van Zyl</b></span>
      </a>
      <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>

      <!-- Header links -->
      <div class="collapse navbar-collapse mr-auto" id="navbarSupportedContent">
        <ul class="navbar-nav ml-auto">
          <li class="nav-item ">
            <a class="nav-link" href="editProducts.php">Edit Products</a>
          </li>
          <li class="nav-item ">
            <a class="nav-link" href="editAdminOrders.php">Edit Orders</a>
          </li>
          <li class='nav-item'>
            <a class='nav-link' href='backend/signOut.php'>Sign Out</a>
          </li>
        </ul>
      </div>
    </nav>
  </div>

  <!-- Page container -->
  <div class="adminContainer">

    <div class="adminborder">

    </div>
        <div class="container-fluid">
          <div class="row justify-content-center" >
            <div class="col">
            <div>
              <h1 class="adminHeadings">EDIT ADMIN ACCOUNT</h1>
            </div>
              </div>
          </div>
            <div class="row  justify-content-center" >
            <div class="col-6-auto">
                <a class="btn btn-secondary btn-md" href="editAccounts.php" role="button" id="backButton" > < BACK</a>
            </div>
            </div>
        </div>
  </div>


    <div class="container-fluid" id="adminMainContainer">
      <div class="row justify-content-center">
        <div class="col-sm-3"></div>
        <div class="col-sm-6" id="emailShorten">
        <?php

        require_once ("backend/editAdmin.php");  ?>


</body>

</html>
