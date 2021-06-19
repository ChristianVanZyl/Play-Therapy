<?php
error_reporting(E_ALL);
ini_set("display_errors", "1");
session_start();
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
<body id="prodBody">
  <?php
  require_once ("header.php");
  ?>
<!-- Page container -->

<div class="container-fluid" style="  padding-top: 140px;">
  <nav aria-label="breadcrumb" id="breadCustom">
    <ol class="breadcrumb">
      <li class="breadcrumb-item"><a href="/" id="breadLink">Home</a></li>
        <li class="breadcrumb-item"><a href="cartScreen.php" id="breadLink">Cart</a></li>
      <li class="breadcrumb-item active" aria-current="page" style="color: #95ab9e">Check Out</li>
    </ol>
  </nav>
</div>
<div class='prodMainunderlineDiv'>  </div>


 <div class="container-fluid" style="padding-top: 3%; padding-left: 15%; padding-right: 15%;  padding-bottom: 20%; ">

 <div class="row">
   <!-- style="width: 400px; height: auto; margin: 0 !important; padding: 0 !important; border: 2px solid #F2F2F2;
  border-radius: 6px 6px 6px 6px;; border-color:#596e79"> -->

   <div class="col-sm-12">
      <h6 style="text-align: left; font-size: 20px; padding-bottom: 2%;">Order Details:</h6>
      <?php

      require_once ("backend/connDB.php");

      // initialize session on all pages requiring knowledge if user is logged in or not

      // create new object conn. Calls new instance of mysqli function, using values from loginDB
      $conn = mysqli_connect($hostName, $username, $password, $databaseName);
      // connect_error is a property of the conn object, if it has a value, the die function is called to terminate the program
       if($conn->connect_error) {
         // the error is not written to console after dev is completed, because can give hackers information in certain circumstances
         die("Fatal Error");
       };

     if(isset($_SESSION['cart'])) {
       $_SESSION['totalCart'] = 0;
     foreach ($_SESSION['cart'] as $prodID){

     $productInfo = "SELECT * FROM product WHERE productID = $prodID";
     $result = $conn->query($productInfo);

     while($row = $result->fetch_assoc()) {
       if($row['categoryID'] === 1)
       {
         $insertType = "Toys";
       }else{
         $insertType = "Books";;
       }

       if($row['prodQuantity'] === 0)
       {
         $insertStock = "Out of Stock";
       }else {
         $insertStock = 1;
         $_SESSION['totalCart'] = $_SESSION['totalCart'] + $row['prodprice'];
       }

       $insertTotal = $row['prodprice'] + 180;

       echo  "
                <p class='orderScreenTitles'><span style='font-weight: 700'>Shipping Address:</span> " .$insertType. "</p>
                <p class='orderScreenTitles'><span style='font-weight: 700' >Product Name:</span> " .$row['productName']. "&nbsp;&nbsp;&nbsp;  <img src='data:image/jpg;base64, " .base64_encode($row['prodImg']). "' style='width: 50px; height: 50px;' ></p>
                <p class='orderScreenTitles'><span style='font-weight: 700'>Category:</span> " .$insertType. "</p>
                <p class='orderScreenTitles'><span style='font-weight: 700'>Quantity:</span> " .$insertStock. "</p>
                <p class='orderScreenTitles'><span style='font-weight: 700'>Price:</span> R" .$row['prodprice']. "</p>
                <p class='orderScreenTitles'><span style='font-weight: 700'>Shipping:</span> R180</p>
                <p class='orderScreenTitles'><span style='font-weight: 700'>Total:</span> R" .$insertTotal. "</p>";
     }
   }}
   mysqli_close($conn);

   exit;
?>
</div>
 </div>
</div>


<?php
require_once ("footer.php");
?>

<!--  Page container end-->

<!--  Bootstrap and own scripts-->
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js" integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous"></script>
<script src="index.js" charset="utf-8"></script>
</body>

</html>
