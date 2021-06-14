<?php
// to display errors helpful during development
error_reporting(E_ALL);
ini_set("display_errors", "1");
session_start();
// initialize session on all pages requiring knowledge if user is logged in or not
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
<body id="prodBody">
  <?php
  require_once ("header.php");
  ?>
<!-- Page container -->

<div class="container-fluid" style="  padding-top: 140px;">
  <nav aria-label="breadcrumb" id="breadCustom">
    <ol class="breadcrumb">
      <li class="breadcrumb-item"><a href="/" id="breadLink">Home</a></li>
      <li class="breadcrumb-item active" aria-current="page" style="color: #95ab9e">Product Details</li>
    </ol>
  </nav>
</div>
<div class='prodMainunderlineDiv'>  </div>
 <div class="container-fluid">
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
      $id = '';
      if( isset( $_GET['id'])) {
          $id = $_GET['id'];
      }

      $productInfo = "SELECT * FROM product WHERE productID = $id";
      $result = $conn->query($productInfo);

      if ($result) {
        while($row = $result->fetch_assoc()) {
          if($row['categoryID'] == 1)
          {
            $insertType = "Toys";
          }else{
            $insertType = "Books";;
          }
            if($row['prodQuantity'] > 0){
              $inStock = "<p id='prodScreenInStck' ><strong>IN STOCK</strong></p>
                        <i class='far fa-grin-beam fa-2x p-1' style='color: #596e79; margin-left: 25%'></i>";
            }else{
              $inStock = "<p id='prodScreenOutStck' ><strong>OUT OF STOCK</strong></p><p>
                    <i class='far fa-frown-open fa-2x p-1' style='color: red; margin-left: 30%'></i>
              </p>";
            }
         echo  " <div class='row' style='padding: 5% 15% 5% 15%; margin-top: 2.5%; margin-bottom: 2.5%'>
           <div class='col-sm-12 col-md-6'>
              <img class='img-fluid' src='data:image/jpg;base64, " .base64_encode($row['prodImg']). "' style='margin-left: 25%' >
           </div>
           <div class='col-sm-12 col-md-6'>

              <h2 id='prodScreenHeading'>" .$row['productName']. "</h2>
              <h4 id='prodScreenCat'>" .$insertType. "</h2>
                   <div class='underlineDiv'>  </div>

              <p id='prodScreenpara'><strong>Product Description:</strong></p>
              <p id='prodScreenpara2'> " .$row['prodType']. "</p>

                 <div class='row'>
              <div class='col-sm-12 col-md-6'>
              <h2 id='prodScreenHeading' style='margin-top: 30%; padding-top: 5%; padding-bottom: 2%'>R" .$row['prodprice']. "</h2>";
              if (isset($_SESSION['login']) && $_SESSION['login'] === true){
                  echo "
                  <form method='post' action='backend/addToCart.php?id= " .$row['productID']. "'>
                  <button name='submit' value='submit' type='submit' class='btn btn-primary' id='cartButton'>Add to Cart &nbsp;<i class='fas fa-shopping-cart'></i></button></form>";
                }else{
                echo "
                <script type='text/javascript'> function JSalert() {
                  alert('Please sign up/login before adding items to cart');
                }
                 </script>
                <button onclick='event.preventDefault(), JSalert()' class='btn btn-primary' id='cartButton'>Add to Cart &nbsp;<i class='fas fa-shopping-cart'></i></button>";

              };
            echo"
           </div>
            <div class='col-sm-12 col-md-6'>
              " .$inStock. "
             <p id='prodDeliv'>&nbsp;<i class='fas fa-truck fa-2x p-1' style='color:  #596e79'></i>&nbsp;&nbsp;Delivery in 7 working days</p>
            </div>
               </div>
              </div>
            </div>";
         mysqli_close($conn);
     }}else {
         echo "Error fetching product";
         mysqli_close($conn);
         // terminate script
         exit;
     }
     ?>
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
