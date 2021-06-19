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
      <li class="breadcrumb-item active" aria-current="page" style="color: #95ab9e">My Orders</li>
    </ol>
  </nav>
</div>
<div class='prodMainunderlineDiv'>  </div>


<div class="container-fluid" style="padding-top: 7%; padding-left: 10%; padding-right: 10%; padding-bottom: 10%; ">
  <div class="row">
    <div class="col-sm-12 col-md-3">
    </div>
    <div class="col-sm-12 col-md-6">
         <h6 style="text-align: left; font-size: 20px; padding-bottom: 2%;">Order Details:</h6>
         <div class="table-responsive-xs">
         <table class="table table-bordered table-striped">
           <thead>
             <tr>
               <th scope="col">Order Number</th>
               <th scope="col">Order Price</th>
               <th scope="col">Date</th>
               <th scope="col">Delivery Status</th>
             </tr>
           </thead>
           <tbody>
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




             $orderInfo = "SELECT * FROM ordertransaction WHERE accountID = '$id'";

             $result = mysqli_query($conn, $orderInfo);
             $count = mysqli_num_rows($result);
               if ($result->num_rows > 0) {
                 while($row = $result->fetch_assoc()) {

                   if($row['orderDelivered'] == 0)
                   {
                     $insertCheck = "<i class='fas fa-times' style='color: red'></i>";
                   }else{
                     $insertCheck = "<i class='fas fa-check' style='color: green'></i>";
                   }
                   echo
                   "
                   <tr>
                     <th scope='row'> " .$row['orderID']. "</th>
                     <td>" .$row['orderTotalPrice']. "</td>
                     <td>" .$row['orderDate']. "</td>
                     <td>" .$insertCheck. "</td>";

                 }

               }

                 ?>
           </tbody>
         </table>
       </div>


    </div>
    <div class="col-sm-12 col-md-3">
    </div>
    </div>
    </div>

<?php
require_once ("footer.php");
?>
<!--  Bootstrap and own scripts-->
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js" integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous"></script>
<script src="index.js" charset="utf-8"></script>
</body>

</html>
