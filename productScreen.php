<?php
// initialize session on all pages requiring knowledge if user is logged in or not
session_start();
 ?>

 <!-- for product page -->

 <div class="container-fluid">

   <div class="row justify-content-md-center">



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
           if (++$counter == 9){ break;}
            };
            mysqli_close($conn);
        ?>

      </div>


   </div>
