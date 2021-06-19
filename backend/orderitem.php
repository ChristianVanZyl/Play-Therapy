<?php
// require once so that file is read once and not multiple times, prevent wasteful multiple disk access
require_once ("connDB.php");
error_reporting(E_ALL);
ini_set("display_errors", "1");
session_start();
// create new object conn. Calls new instance of mysqli function, using values from loginDB
$conn = mysqli_connect($hostName, $username, $password, $databaseName);
// connect_error is a property of the conn object, if it has a value, the die function is called to terminate the program
 if($conn->connect_error) {
   // the error is not written to console after dev is completed, because can give hackers information in certain circumstances
   die("Fatal Error");
 }else {
   echo "connection success";
 };


// account info
if(isset($_SESSION['uid'])) {
   $id = $_SESSION['uid'];
}
else {
   echo "Index not present";
}

$quantityOrdered = 1;
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

 $shippingPrice = 180;
if(isset($_SESSION['cart'])) {

foreach ($_SESSION['cart'] as $prodID){

  $orderItemProdIDInfo  = "SELECT productID, prodprice FROM product WHERE productID = $prodID";
  $result = $conn->query($orderItemProdIDInfo);

  while($row = $result->fetch_assoc()) {
    $totalLinePrice = $shippingPrice + $row['prodprice'];
    $productID = $row['productID'];
    $orderItemInsert = "INSERT INTO orderitem (orderID, productID, quantityOrdered, totalLinePrice) VALUES ('$orderID', '$productID', '$quantityOrdered', '$totalLinePrice')";
    if(mysqli_query($conn, $orderItemInsert)){
      echo "Success";

    } else{
      echo "Failure";
      mysqli_close($conn);

    }
    }
  }
}

mysqli_close($conn);
header("Location: ../paymentScreen.php");
exit;
