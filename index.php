<?php
// to display errors helpful during development
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
<body id="indexBody">
  <?php
  require_once ("header.php");
  ?>
<!-- Page container -->
<div class="container-fluid" id="mainContainer">
  <!-- Main column where content goes  -->
  <div class="main">
    <!-- Search Bar and Image -->



    <div class="container-fluid" id="homeContainer">
      <div class="row">
        <div class="col-sm-12 col-sm-6">
          <p class="subscript1">
            "Birds fly, fish swim, and children play."
          </p>
          <p class="subscript2">Dr. Gary Landreth</p>
        </div>
        <div class="col-sm-12 col-sm-6">
          <div class="input-group mb-3" id="searchBar">

            <input type="text" name="search" class="form-control" placeholder="Search for a product"/>
            <div class="input-group-append">
                <button name='submit' value='submit' type='submit' class='btn btn-primary' id='searchButton'><i class="fas fa-search"></i></button>
            </div>

          </div>
        </div>
      </div>
    </div>


    <div class="container-fluid">
      <div class="row justify-content-center"  id="browseLinksRow">
        <div class="col-6-auto" id="browseLinksP">
          <a class="btn btn-light btn-sm" href="productViewScreenBooks.php" role="button" id="browseButton">Browse Books <img src="./images/linkIcon.jpg" alt="linkIcon" width="100px"></a>
        </div>
        <div class="col-6-auto" id="browseLinksP">
          <a class="btn btn-light btn-sm" href="productViewScreenToys.php" role="button" id="browseButton">&nbsp; Browse Toys &nbsp; <img src="./images/linkIcon2.jpg" width="100px" alt="linkIcon"></a>
        </div>
      </div>
      <div class='mainunderlineDiv'>  </div>
    </div>


<div class="container-fluid" id="productContainer">



<h1 id="underMainHeadings">Popular Products</h1>
  <div class="row justify-content-center">
   <?php
   require_once ("backend/connDB.php");

   // create new object conn. Calls new instance of mysqli function, using values from loginDB
   $conn = mysqli_connect($hostName, $username, $password, $databaseName);
   // connect_error is a property of the conn object, if it has a value, the die function is called to terminate the program
    if($conn->connect_error) {
      // the error is not written to console after dev is completed, because can give hackers information in certain circumstances
      die("Fatal Error");
    };

   $counter = 0;
   $productInfo = "SELECT * FROM product ORDER BY prodprice ASC";
   $result = mysqli_query($conn, $productInfo);

       foreach($result as $row){
         echo  "

         <div class='col-sm-12 col-md-6 col-lg-3 p-2' >
            <a href='productScreen.php?id= " .$row['productID']. "' style='text-decoration:none;'>
         <div class='card h-100 text-center'>
               <img src='data:image/jpg;base64, " .base64_encode($row['prodImg']). "' class='img-fluid' style='margin: auto; padding-top: 20px; padding-bottom: 20px;'>
         <div class='card-body' style='background-color: #f7f7f8; padding: 1rem;'>
         <h5 class='card-title p-2 h-25' style='font-size: 16px; color:#596e79'>" .$row['productName']. "</h5>
         <br />

         <p class='card-text' style='color:#596e79'><strong>R" .$row['prodprice']. "</strong></p>
          <div class='card-footer '>";

          if (isset($_SESSION['login']) && $_SESSION['login'] === true){
            echo "
            <form method='post' action='backend/addToCart.php?id= " .$row['productID']. "'>
            <button name='submit' value='submit' type='submit' class='btn btn-primary' id='cartButton'>Add to Cart &nbsp;<i class='fas fa-shopping-cart'></i></button></form></div>
                 </div>
           </div>
           </a>
           </div>";
          }else{
          echo "
          <script type='text/javascript'> function JSalert() {
            alert('Please sign up/login before adding items to cart');
          }
           </script>
          <button onclick='event.preventDefault(), JSalert()' class='btn btn-primary' id='cartButton'>Add to Cart &nbsp;<i class='fas fa-shopping-cart'></i></button></div>
               </div>
         </div>
         </a>
         </div>";

          }
          if (++$counter == 4){ break;}
           };
           mysqli_close($conn);
       ?>
     </div>

     <h1 id="underMainHeadings" style="padding-top: 4%">Featured Products</h1>
     <div class="row justify-content-center">
      <?php
      require_once ("backend/connDB.php");

      // create new object conn. Calls new instance of mysqli function, using values from loginDB
      $conn = mysqli_connect($hostName, $username, $password, $databaseName);
      // connect_error is a property of the conn object, if it has a value, the die function is called to terminate the program
       if($conn->connect_error) {
         // the error is not written to console after dev is completed, because can give hackers information in certain circumstances
         die("Fatal Error");
       };

      $counter = 0;
      $productInfo = "SELECT * FROM product ORDER BY prodprice DESC";
      $result = mysqli_query($conn, $productInfo);

          foreach($result as $row){
            echo  "

            <div class='col-sm-12 col-md-6 col-lg-3 p-2' >
               <a href='productScreen.php?id= " .$row['productID']. "' style='text-decoration:none;'>
            <div class='card h-100 text-center'>
                  <img src='data:image/jpg;base64, " .base64_encode($row['prodImg']). "' class='img-fluid' style='margin: auto; padding-top: 20px; padding-bottom: 20px;'>
            <div class='card-body' style='background-color: #f7f7f8; padding: 1rem;'>
            <h5 class='card-title p-2 h-25' style='font-size: 16px; color:#596e79'>" .$row['productName']. "</h5>
            <br />

            <p class='card-text' style='color:#596e79'><strong>R" .$row['prodprice']. "</strong></p>
             <div class='card-footer '>";

             if (isset($_SESSION['login']) && $_SESSION['login'] === true){
               echo "
               <form method='post' action='backend/addToCart.php?id= " .$row['productID']. "'>
               <button name='submit' value='submit' type='submit' class='btn btn-primary' id='cartButton'>Add to Cart &nbsp;<i class='fas fa-shopping-cart'></i></button></form></div>
                    </div>
              </div>
              </a>
              </div>";
             }else{
             echo "
             <script type='text/javascript'> function JSalert() {
               alert('Please sign up/login before adding items to cart');
             }
              </script>
             <button onclick='event.preventDefault(), JSalert()' class='btn btn-primary' id='cartButton'>Add to Cart &nbsp;<i class='fas fa-shopping-cart'></i></button></div>
                  </div>
            </div>
            </a>
            </div>";

             }
             if (++$counter == 4){ break;}
              };
              mysqli_close($conn);
          ?>
        </div>


        <div class="container" id="supportSection">
          <div class="row justify-content-center text-center">
            <div class="col-sm-12 col-md-3">

              <i class="fas fa-shield-alt fa-3x"></i>
            </div>
            <div class="col-sm-12 col-md-3 ">

              <i class="fas fa-certificate fa-3x"></i>
            </div>
            <div class="col-sm-12 col-md-3">

              <i class="fas fa-truck fa-3x"></i>
            </div>
            <div class="col-sm-12 col-md-3 ">

            <i class="fas fa-envelope-open-text fa-3x"></i>
            </div>
          </div>
          <div class="row justify-content-center text-center" style="padding-top:2%">
            <div class="col-sm-12 col-md-3">
              <p>Safe and secure payments through payfast!</p>

            </div>
            <div class="col-sm-12 col-md-3 ">
              <p>An inventory of products hand-picked by a practising play therapist</p>

            </div>
            <div class="col-sm-12 col-md-3">
                <p>Delivery within 7 days!</p>

            </div>
            <div class="col-sm-12 col-md-3 ">
              <p> We'd love to hear from you! Send us a message if you have any questions.</p>

            </div>
          </div>

        </div>







  </div>
  </div>



  <?php
    require_once ("footer.php");
  ?>
  </div>
<!--  Page container end-->

<!--  Bootstrap and own scripts-->
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js" integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous"></script>
<script src="index.js" charset="utf-8"></script>
</body>

</html>
