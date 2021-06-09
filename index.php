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
            <input type="text" class="form-control" />
            <div class="input-group-append">
              <button id="searchButton" class="btn btn-primary">
                <i class="fas fa-search"></i>
              </button>
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
    </div>

<!-- bootstrap carousel -->

<div class="container-fluid">


      <div id="carouselExampleCaptions" class="carousel slide" data-ride="carousel">
        <ol class="carousel-indicators">
          <li data-target="#carouselExampleCaptions" data-slide-to="0" class="active"></li>
          <li data-target="#carouselExampleCaptions" data-slide-to="1"></li>
          <li data-target="#carouselExampleCaptions" data-slide-to="2"></li>
        </ol>
        <div class="carousel-inner ">
          <div class="carousel-item active ">
            <img src="images/bulldog2small.jpg" class="d-block w-25" alt="bulldog" >
            <div class="carousel-caption d-none d-md-block">
              <h5>First slide label</h5>
              <p>Nulla vitae elit libero, a pharetra augue mollis interdum.</p>
            </div>
          </div>
          <div class="carousel-item ">
            <img src="images/DrooperDogsmall.jpg" class="d-block w-25" alt="sooth" >
            <div class="carousel-caption d-none d-md-block">
              <h5>Second slide label</h5>
              <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit.</p>
            </div>
          </div>
          <div class="carousel-item ">
            <img src="images/bunnysmall.jpg" class="d-block w-25" alt="wince" >
            <div class="carousel-caption d-none d-md-block">
              <h5>Third slide label</h5>
              <p>Praesent commodo cursus magna, vel scelerisque nisl consectetur.</p>
            </div>
          </div>
        </div>
        <a class="carousel-control-prev" href="#carouselExampleCaptions" role="button" data-slide="prev">
          <span class="carousel-control-prev-icon" aria-hidden="true"></span>
          <span class="sr-only">Previous</span>
        </a>
        <a class="carousel-control-next" href="#carouselExampleCaptions" role="button" data-slide="next">
          <span class="carousel-control-next-icon" aria-hidden="true"></span>
          <span class="sr-only">Next</span>
        </a>
      </div>

</div>


<div class="container-fluid">


  <h6>New Releases</h6>
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
   $productInfo = "SELECT productID, categoryID, productName, prodType, prodprice, prodQuantity, prodImg FROM product";
   $result = mysqli_query($conn, $productInfo);

       foreach($result as $row){
         echo  "<div class='col-sm-12 col-md-6 col-lg-4 p-2' align='center'>
         <div class='card text-center' style='width: 350px; height: 450px'>
               <img src='data:image/jpg;base64, " .base64_encode($row['prodImg']). "' class='card-img-top' style='width: 300px; height: 300px; margin: auto; padding-top: 20px; padding-bottom: 20px;'>
               <div class='card-body' style='background-color: #f7f7f8; padding: 1rem;'>
               <h5 class='card-title p-2' style='font-size: 16px; color:#596e79'>" .$row['productName']. "</h5>
               <a href='' class='btn btn-primary' id='signInButton' >Add to Cart &nbsp;<i class='fas fa-shopping-cart'></i></a>
               </div>
         </div>
         </div>";
          if (++$counter == 4){ break;}
           };
           mysqli_close($conn);
       ?>
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
