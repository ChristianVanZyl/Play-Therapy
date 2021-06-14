<?php
// to display errors helpful during development
error_reporting(E_ALL);
ini_set("display_errors", "1");
// initialize session on all pages requiring knowledge if user is logged in or not

session_start();
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
      <a class="navbar-brand" href="admin.php"><img id="playLogo" src="./images/logo.png" alt="playLogo" width="170" height="100" /><span>PLAY THERAPY TOYS <b>by Lenka De Villiers-Van Zyl</b></span>
      </a>
      <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>

      <!-- Header links -->
      <div class="collapse navbar-collapse mr-auto" id="navbarSupportedContent">
        <ul class="navbar-nav ml-auto">
          <li class="nav-item ">
            <a class="nav-link" href="editAccounts.php">Edit Accounts</a>
          </li>
          <li class="nav-item ">
            <a class="nav-link" href="adminViewOrders.php">Edit Orders</a>
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
              <h1 class="adminHeadings">ADD PRODUCTS</h1>
            </div>
              </div>
          </div>
            <div class="row  justify-content-center" >
            <div class="col-6-auto">
                <a class="btn btn-secondary btn-md" href="editProducts.php" role="button" id="backButton" > < BACK</a>
            </div>
            </div>
        </div>
  </div>


    <div class="container-fluid" id="adminMainContainer">
      <div class="row justify-content-center">
        <div class="col-sm-3"></div>
        <div class="col-sm-6" id="emailShorten">

        <form id="addproductform" method="post" action="backend/addProducts.php"  onsubmit="return productSubmitHandler()">
            <div class="form-row">
              <div class="form-group col-6-md">
                <label class="label" for="inputCategoryID">Category:</label>
                <input name="categoryID" type="text" style="width: 100px" class="form-control" id="inputCategory" placeholder="Enter category"/>
                <div class="invalid-feedback">Please enter a valid category.</div>
              </div>
              <div class="form-group col-6-md">
                <label class="label" for="inputProdName">Product Name:</label>
                <input name="productName" type="text" style="width: 420px"  class="form-control" id="inputProdName" placeholder="Enter product name"/>
                <div class="invalid-feedback">Please enter a product name.</div>
              </div>
            </div>
            <div class="form-row">
              <div class="form-group col-6-md">
                <label class="label" for="inputProdType">Type:</label>
                <input name="prodType" type="text" style="width: 400px" class="form-control" id="inputProdType" placeholder="Enter product type"/>
                <div class="invalid-feedback">Please enter product type.</div>
              </div>
              <div class="form-group col-6-md">
                <label class="label" for="inputPrice">Price:</label>
                <input name="prodprice" type="text" style="width: 120px" class="form-control" id="inputPrice" placeholder="Enter price" />
                <div class="invalid-feedback">Please enter a valid price.</div>
              </div>
            </div>
            <div class="form-row">
              <div class="form-group col-6-md">
                <label class="label" for="inputQuantity">Quantity:</label>
                <input name="prodQuantity" type="number" style="width: 120px" class="form-control" id="inputQuantity" placeholder="Select"/>
                <div class="invalid-feedback">Please select a valid quantity.</div>
              </div>
            <div class="form-group col-6-md">
              <label class="label" for="inputQuantity">Image upload:</label>
              <input name="prodImg" type="file" style="width: 300px" class="form-control" id="inputImg" />
              <div class="invalid-feedback">Please select a valid file.</div>
            </div>
            </div>
            <button  name="submit" value="submit" type="submit" class="btn btn-primary " id="signUpButton">Upload product</button>
          </form>
          </div>
        </div>
        <div class="col-sm-3"></div>
      </div>
      <!--  Bootstrap and own scripts-->
      <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
      <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
      <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js" integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous"></script>
      <script src="index.js" charset="utf-8"></script>
</body>

</html>
