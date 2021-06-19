<?php

// require once so that file is read once and not multiple times, prevent wasteful multiple disk access
require_once ("connDB.php");

// create new object conn. Calls new instance of mysqli function, using values from loginDB
$conn = mysqli_connect($hostName, $username, $password, $databaseName);
// connect_error is a property of the conn object, if it has a value, the die function is called to terminate the program
 if($conn->connect_error) {
   // the error is not written to console after dev is completed, because can give hackers information in certain circumstances
   die("Fatal Error");
 };


$orderInfo = "SELECT * FROM ordertransaction";

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
        <td>" .$row['accountID']. "</td>
        <td>" .$row['orderTotalPrice']. "</td>
        <td>" .$row['orderDate']. "</td>
        <td>" .$insertCheck. "</td>
        <td><a href='backend/changeOrderStatus.php?id= " .$row['orderID']. "' style='text-decoration:none; color: grey'><i class='fas fa-edit'></i></a></td>  ";
    }

  }

  mysqli_close($conn);

    exit;

?>
