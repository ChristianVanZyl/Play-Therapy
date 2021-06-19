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


// payment info and product
if(isset($_SESSION['cart'])) {
  $_SESSION['totalCart'] = 0;
foreach ($_SESSION['cart'] as $prodID){

$productInfo = "SELECT * FROM product WHERE productID = $prodID";
$result = $conn->query($productInfo);

while($row = $result->fetch_assoc()) {

    $_SESSION['totalCart'] = $_SESSION['totalCart'] + $row['prodprice'];
  }
}}

$orderDelivered = 0;
$shippingPrice = 180.00;
$orderTotalPrice = $_SESSION['totalCart'] + $shippingPrice;
$orderPrice = $_SESSION['totalCart'];
$orderDate = date('Y-m-d');


$orderInsert = "INSERT INTO ordertransaction (accountID, shippingPrice, orderTotalPrice, orderPrice, orderDate, orderDelivered) VALUES ('$id', '$shippingPrice', '$orderTotalPrice', '$orderPrice', '$orderDate', '$orderDelivered')";
if(mysqli_query($conn, $orderInsert)){
    mysqli_close($conn);
    header("Location: ../shippingScreen.php");
    exit;

} else{
    echo "Failure: $orderInsert. " . mysqli_error($conn);
}
