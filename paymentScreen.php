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
        <li class="breadcrumb-item"><a href="shippingScreen.php" id="breadLink">Shipping</a></li>
      <li class="breadcrumb-item active" aria-current="page" style="color: #95ab9e">Check Out</li>
    </ol>
  </nav>
</div>
<div class='prodMainunderlineDiv'>  </div>


 <div class="container-fluid" style="padding-top: 7%; padding-left: 10%; padding-right: 10%; padding-bottom: 5%; ">


 <div class="row">
   <div class="col-sm-12 col-md-4">
   </div>
   <div class="col-sm-12 col-md-6">

    <h6 style="text-align: left; font-size: 20px; padding-bottom: 5%;">Order Details:</h6>

          <div class="container-fluid">
           <div class="row" style="margin-left: 0; margin-right">

             <div class="col-sm-12" style="margin: 0 !important;padding: 0 !important;">

     <?php

     // require once so that file is read once and not multiple times, prevent wasteful multiple disk access
     require_once ("backend/connDB.php");

     // create new object conn. Calls new instance of mysqli function, using values from loginDB
     $conn = mysqli_connect($hostName, $username, $password, $databaseName);
     // connect_error is a property of the conn object, if it has a value, the die function is called to terminate the program
      if($conn->connect_error) {
        // the error is not written to console after dev is completed, because can give hackers information in certain circumstances
        die("Fatal Error");
      };

      if(isset($_SESSION['uid'])) {
          $id = $_SESSION['uid'];
      }
      else {
          echo "Index not present";
      }

     $accountInfo = "SELECT accountEmail FROM account WHERE accountID = $id";
     $result = $conn->query($accountInfo);

     if(mysqli_num_rows($result) == 0) {

     echo "<script type='text/javascript'>alert('Account ID not found.');

     </script>";

     }else{

         $row = mysqli_fetch_array($result);
         $accountEmail = $row['accountEmail'];
       }


       $orderItemIDInfo = "SELECT orderID FROM ordertransaction WHERE accountID = $id";
       $result = $conn->query($orderItemIDInfo);

       if(mysqli_num_rows($result) == 0) {

       echo "<script type='text/javascript'>alert('Order ID not found.');

       </script>";

       }else{

         $numResults = mysqli_num_rows($result);
         $counter = 0;
         while ($row = $result->fetch_assoc()) {
             if (++$counter == $numResults) {
                 $orderID = $row['orderID'];
             }
         }
         }

         $orderDate = date('Y-m-d');

    echo "<p class='orderScreenTitles'><span style='font-weight: 700'>Account:</span> " .$accountEmail. "</p>";
    echo "<p class='orderScreenTitles'><span style='font-weight: 700'>Product(s):</span></p>";

     if(isset($_SESSION['cart'])) {
       $_SESSION['totalCart'] = 0;
     foreach ($_SESSION['cart'] as $prodID){

     $productInfo = "SELECT * FROM product WHERE productID = $prodID";
     $result = $conn->query($productInfo);

     while($row = $result->fetch_assoc()) {


       if($row['prodQuantity'] === 0)
       {
         $insertStock = "Out of Stock";
       }else {
         $insertStock = 1;
         $_SESSION['totalCart'] = $_SESSION['totalCart'] + $row['prodprice'];
       }

        echo"  <p class='orderScreenTitles'><span style='font-weight: 700' >" .$row['productName']. "&nbsp;&nbsp;&nbsp;  <img src='data:image/jpg;base64, " .base64_encode($row['prodImg']). "' style='width: 50px; height: 50px;' ></p>";

     }

   }
     echo "<p class='orderScreenTitles'><span style='font-weight: 700'>Total:</span> R" .$_SESSION['totalCart']. "</p>";

     // in order for payfast to redirect after payment to your website during development, it is needed to change the index.php file in the htdocs folder of your xampp folder
     // the header location needs to be changed to the folder of the project in htdocs' name and you need to set the page it directs you to
     // this is what should be changed in the header location       header('Location: '.$uri.'/playtherapy/index.php');

     echo"
     <div class='container-fluid' style='padding-top: 2%'>
     <form action='https://sandbox.payfast.co.za/eng/process' name='form_c741fd0b9c9c00c2b842839588803224' onsubmit='return click_c741fd0b9c9c00c2b842839588803224( this );' method='post'>
        <input type='hidden' name='cmd' value='_paynow'>
        <input type='hidden' name='receiver' value='10022985'>
        <input type='hidden' name='item_name' value='Play Therapy Products'>
        <input type='hidden' name='amount' value= '" .$_SESSION['totalCart']. "'>
        <input type='hidden' name='item_description' value='Play Therapy Products'>
        <input type='hidden' name='return_url' value='http://www.localhost/'>
        <table>
        <tr><td><font color='red'>*</font>&nbsp;Price</td><td><input type='text' name='custom_amount' class='pricing' value='" .$_SESSION['totalCart']. "'></td></tr>
        <tr><td colspan=2 align=center style='padding-top: 8%; '><input type='image' src='https://www.payfast.co.za/images/buttons/light-large-paynow.png' width='174' height='59'  alt='Pay Now' style='margin-right: 15%' title='Pay Now with PayFast'></td></tr></table>
      </form>
   </div>
      ";
}


if(isset($_SESSION['cart'])) {

foreach ($_SESSION['cart'] as $prodID){

$productInfo = "SELECT prodQuantity FROM product WHERE productID = $prodID";
$result = $conn->query($productInfo);

while($row = $result->fetch_assoc()) {

  $productQ = $row['prodQuantity'] - 1;
  $updateProductQuantity = "UPDATE product SET prodQuantity = '$productQ' WHERE productID = $prodID";
  if(mysqli_query($conn, $updateProductQuantity )){
  }
}
}
}
$_SESSION['cartQuantity']= 0;
$_SESSION['totalCart'] = 0;
$_SESSION['cart']= [];

mysqli_close($conn);
exit;

  ?>
 </div>
</div>
</div>

 </div>
 <div class="col-sm-12 col-md-4">
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
