<?php

// require once so that file is read once and not multiple times, prevent wasteful multiple disk access
require_once ("connDB.php");
session_start();
// error_reporting(0);
// ini_set('display_errors', 0);

// create new object conn. Calls new instance of mysqli function, using values from loginDB
$conn = mysqli_connect($hostName, $username, $password, $databaseName);
// connect_error is a property of the conn object, if it has a value, the die function is called to terminate the program
 if($conn->connect_error) {
   // the error is not written to console after dev is completed, because can give hackers information in certain circumstances
   die("Fatal Error");
 };

$productInfo = "SELECT productID, categoryID, productName, prodType, prodprice, prodQuantity FROM product";
$result = mysqli_query($conn, $productInfo);
$count = mysqli_num_rows($result);
  if ($result->num_rows > 0) {
    while($row = $result->fetch_assoc()) {
      echo
      "
      <tr>
        <th scope='row'> " .$row['productID']. "</th>
        <td>" .$row['categoryID']. "</td>
        <td>" .$row['productName']. "</td>
        <td>" .$row['prodType']. "</td>
        <td>R" .$row['prodprice']. "</td>
        <td>" .$row['prodQuantity']. "</td>
        <td><a href='editAdminProducts.php?id= " .$row['productID']. "' style='text-decoration:none; color: grey'><i class='fas fa-edit'></i></a></td>
        <td><a href='backend/deleteProduct.php?id= " .$row['productID']. "' style='text-decoration:none; color: red'><i class='fas fa-trash'></i></a></td>
      </tr>";
    }
  }

  mysqli_close($conn);

    exit;

?>
