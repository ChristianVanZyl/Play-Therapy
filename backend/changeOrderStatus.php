<?php
error_reporting(E_ALL);
ini_set("display_errors", "1");
// require once so that file is read once and not multiple times, prevent wasteful multiple disk access
require_once ("connDB.php");
session_start();
// initialize session on all pages requiring knowledge if user is logged in or not

// create new object conn. Calls new instance of mysqli function, using values from loginDB
$conn = mysqli_connect($hostName, $username, $password, $databaseName);
// connect_error is a property of the conn object, if it has a value, the die function is called to terminate the program
 if($conn->connect_error) {
   // the error is not written to console after dev is completed, because can give hackers information in certain circumstances
   die("Fatal Error");
 };

  if(isset( $_GET["id"])) {
      $id = $_GET["id"];
  }

  $orderInfo = "SELECT orderDelivered FROM ordertransaction WHERE orderID = '$id'";

  $result = mysqli_query($conn, $orderInfo);
  $count = mysqli_num_rows($result);
    if ($result->num_rows > 0) {
      while($row = $result->fetch_assoc()) {
        if($row['orderDelivered'] == 0)
        {
          $orderDelivered = 1;
        }else
        {
          $orderDelivered = 0;
        }
}


$updateReq = "UPDATE ordertransaction SET orderDelivered = '$orderDelivered' WHERE orderID = '$id'";


if(mysqli_query($conn, $updateReq )){
  // closing the connection
  mysqli_close($conn);
  echo "<script type='text/javascript'>alert('Successfully changed order delivery status!');
  location='../editAdminOrders.php';
  </script>";
  exit;
} else{

echo("Error description: " . mysqli_error($conn));
mysqli_close($conn);

  exit;
}
};



?>
