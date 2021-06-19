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
<body id="prodBody">
  <?php
  require_once ("header.php");
  ?>
<!-- Page container -->

<div class="container-fluid" style="  padding-top: 140px;">
  <nav aria-label="breadcrumb" id="breadCustom">
    <ol class="breadcrumb">
      <li class="breadcrumb-item"><a href="/" id="breadLink">Home</a></li>
      <li class="breadcrumb-item"><a href="productViewScreen.php" id="breadLink">Products</a></li>
      <li class="breadcrumb-item active" aria-current="page" style="color: #95ab9e">Books</li>
    </ol>
  </nav>
  </div>
  <div class="container-fluid">
    <div class="row justify-content-center"  id="browseLinksRow">
      <div class="col-auto" id="browseLinksP">
        <h1 id="browseHeading"> Books <img src="./images/linkIcon2.jpg" width="100px" alt="linkIcon"></h1>
      </div>
    </div>
        <div class='mainunderlineDiv'>  </div>
  </div>
  <a class="btn btn-light btn-sm" href="productViewScreenToys.php" role="button" id="browseButtonSmall">Browse Toys</a>
  <div class="container-fluid" id="productContainer">


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

       if (isset ($_GET['page']) ) {
         $page = $_GET['page'];
       } else {
         $page = 1;
       }
       $limit = 4;
       $offset = ($page - 1) * $limit;
       $amountOfProducts = "SELECT COUNT(productID) FROM product";
       $resultSet = mysqli_query($conn, $amountOfProducts);
       $totalRows = mysqli_fetch_array($resultSet)[0];
       $totalPagesNeeded = ceil($totalRows/$limit);

       $productInfo = "SELECT * FROM product WHERE categoryID = 2 LIMIT $offset, $limit";
       $result = mysqli_query($conn, $productInfo);

       while($row = mysqli_fetch_array($result)){

         echo  "<div class='col-sm-12 col-md-4 col-lg-3  p-2' align='center'>
         <a href='productScreen.php?id= " .$row['productID']. "' style='text-decoration:none;' >
         <div class='card h-100 text-center' >
               <img src='data:image/jpg;base64, " .base64_encode($row['prodImg']). "' class='card-img-top' style='margin: auto; padding-top: 20px; padding-bottom: 20px;'>
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

      }
           mysqli_close($conn);
          ?>
          <div class="container" style="padding-top: 5%; padding-bottom: 5%;" >
            <nav aria-label="pageNav">
            <ul class="pagination pagination-lg justify-content-center" >
              <li class="page-item"><a class="page-link" href="<?php if($page <= 1){ echo '#'; } else { echo "?page=".($page - 1); } ?>" id="pageNav">Previous</a></li>
              <li class="page-item"><a class="page-link" href="<?php if($page >= $totalPagesNeeded){ echo '#'; } else { echo "?page=".($page + 1); } ?>" id="pageNav">Next</a></li>
            </ul>
          </nav>
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
