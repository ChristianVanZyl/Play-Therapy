<?php

error_reporting(E_ALL);
ini_set("display_errors", "1");

session_start();
if (isset($_SESSION['name']) && !empty($_SESSION['name']) && $_SESSION['name'] === 'admin'){

}else{
echo "<script type='text/javascript'> alert('Sign in as admin.');
 location='signInScreen.php';
 </script>";
 exit;}

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
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous" />
  <!--  Font Awesome -->
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.13.0/css/all.min.css" integrity="sha256-h20CPZ0QyXlBuAw7A+KluUYx/3pK+c7lYEpqLTlxjYQ=" crossorigin="anonymous" />
  <!--  Google Fonts -->
  <link rel="preconnect" href="https://fonts.gstatic.com" />
  <link href="https://fonts.googleapis.com/css2?family=Noto+Sans:wght@400;700&display=swap" rel="stylesheet" />
  <!--  CSS -->
  <link rel="stylesheet" href="css/styles.css" />
</head>

<body>
  <!--  Header code inserted below-->
  <div class="fixed-top">
    <nav class="navbar navbar-expand-lg" id="navbarAdmin">
      <a class="navbar-brand" href="admin.php"><img id="playLogo" src="./images/logo.png" alt="playLogo" width="170" height="100" /><span>PLAY THERAPY TOYS <b>by Lenka De Villiers-Van Zyl</b></span>
      </a>
      <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>

      <!-- Header links -->
      <div class="collapse navbar-collapse mr-auto" id="navbarSupportedContent">
        <ul class="navbar-nav ml-auto">
          <li class="nav-item">
            <a class="nav-link active" aria-current="page" href="editAccounts.php">Edit Accounts</a>
          </li>
          <li class="nav-item ">
            <a class="nav-link" href="editProducts.php">Edit Products</a>
          </li>
          <li class="nav-item ">
            <a class="nav-link" href="adminViewOrders.php">View Orders</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="backend/signOut.php">Sign Out</a>
          </li>
        </ul>
      </div>
    </nav>
  </div>

  <!-- Page container -->
  <div class="adminContainer">

    <div class="adminborder"></div>
    <!-- Page container -->
    <div class="space">
    </div>
    <div class="container-fluid">
      <div class="row justify-content-center">
        <div class="col-12-sm col-6-md col-4-lg">
          <a href="editAccounts.php"><img id="accounts" src="images/accounts.jpg" alt="accounts" /></a>
        </div>
        <div class="col-12-sm col-6-md col-4-lg">
          <a href="editProducts.php"><img id="products" src="images/products.jpg" alt="accounts" /></a>
        </div>
        <div class="col-12-sm col-6-md col-4-lg">
          <a href="adminViewOrders.php"><img id="orderlist" src="images/orderlist.jpg" alt="accounts" /></a>
        </div>

      </div>
      <div class="row">
        <div class="col-12-sm col-6-md col-4-lg">
          <a class="btn btn-light btn-sm" href="editAccounts.php" role="button" id="adminMenuButton" style="margin-left: 490px">Edit Accounts</a>
        </div>
        <div class="col-12-sm col-6-md col-4-lg">
          <a class="btn btn-light btn-sm" href="editProducts.php" role="button" id="adminMenuButton" style="margin-left: 240px">Edit Products</a>
        </div>
        <div class="col-12-sm col-6-md col-4-lg">
          <a class=" btn btn-light btn-sm" href="adminViewOrders.php" role="button" id="adminMenuButton" style="margin-left: 250px">View Orders</a>
        </div>
      </div>
    </div>
  </div>
  <!--  Bootstrap and own scripts-->
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
  <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js" integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous"></script>
  <script src="index.js" charset="utf-8"></script>
</body>

</html>
