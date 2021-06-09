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
<body id="prodBody">
  <?php
  require_once ("header.php");
  ?>
<!-- Page container -->


<div class="container-fluid" style="  padding-top: 140px;">
  <nav aria-label="breadcrumb" id="breadCustom">
    <ol class="breadcrumb">
      <li class="breadcrumb-item"><a href="/" id="breadLink">Home</a></li>
      <li class="breadcrumb-item active" aria-current="page" style="color: #95ab9e">Products</li>
    </ol>
  </nav>

  <div class="container-fluid" id="productContainer">


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
           echo  "<div class='col-sm-12 col-md-6 col-lg-3 p-2' align='center'>
           <div class='card h-100 text-center' >
                 <img src='data:image/jpg;base64, " .base64_encode($row['prodImg']). "' class='card-img-top' style='width: 300px; height: 300px; margin: auto; padding-top: 20px; padding-bottom: 20px;'>
                 <div class='card-body' style='background-color: #f7f7f8; padding: 1rem;'>
                 <h5 class='card-title p-2' style='font-size: 16px; color:#596e79'>" .$row['productName']. "</h5>
                 <br />
           <p class='card-text'><strong>R" .$row['prodprice']. "</strong></p>
            <div class='card-footer '> <a href='' class='btn btn-primary' id='signInButton' >Add to Cart &nbsp;<i class='fas fa-shopping-cart'></i></a></div>

                 </div>
           </div>
           </div>";
            if (++$counter == 12){ break;}
             };
             mysqli_close($conn);
         ?>
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
