<?php
// to display errors helpful during development
error_reporting(E_ALL);
ini_set("display_errors", "1");
// initialize session on all pages requiring knowledge if user is logged in or not
session_start();
if (isset($_SESSION["admin"])) {

}else{
  "<script type='text/javascript'> alert('Sign in as admin.');
   location='../frontend/screens/signInScreen.php';
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
      <a class="navbar-brand" href="admin.php"><img id="playLogo" src="./images/logo.png" alt="playLogo" width="170" height="100" /><span>PLAY THERAPY TOYS <b>by Lenka De Villiers-Van Zyl</b></span>
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
            <a class="nav-link" href="adminViewOrders.php">View Orders</a>
          </li>
          <li class='nav-item'>
            <a class='nav-link' href='../backend/signOut.php'>Sign Out</a>
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
              <h1 class="adminHeadings">ACCOUNTS</h1>
            </div>
              </div>
          </div>
            <div class="row  justify-content-center" >
            <div class="col-6-auto">
                <a class="btn btn-secondary btn-md" href="admin.php" role="button" id="backButton" > < BACK</a>
            </div>
            <div class="col-6-auto">

            </div>
            </div>

        </div>
  </div>
  <div class="table-responsive-xs">
  <table class="table table-bordered table-striped">
    <thead>
      <tr>
        <th scope="col">ID</th>
        <th scope="col">Email</th>
        <th scope="col">Admin</th>
        <th scope="col">Edit</th>
        <th scope="col">Delete</th>
      </tr>
    </thead>
    <tbody>
    <?php
    require_once ("../backend/users.php");
    ?>
    </tbody>
  </table>
</div>

<!--  Bootstrap and own scripts-->
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js" integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous"></script>
<script src="index.js" charset="utf-8"></script>
</body>

</html>
