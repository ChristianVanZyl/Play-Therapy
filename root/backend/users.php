<?php

// require once so that file is read once and not multiple times, prevent wasteful multiple disk access
require_once ("connDB.php");
error_reporting(0);
ini_set('display_errors', 0);

// create new object conn. Calls new instance of mysqli function, using values from loginDB
$conn = mysqli_connect($hostName, $username, $password, $databaseName);
// connect_error is a property of the conn object, if it has a value, the die function is called to terminate the program
 if($conn->connect_error) {
   // the error is not written to console after dev is completed, because can give hackers information in certain circumstances
   die("Fatal Error");
 };

$accountInfo = "SELECT accountID, accountEmail, accountAccLVL FROM account";
$result = mysqli_query($conn, $accountInfo);
$count = mysqli_num_rows($result);
  if ($result->num_rows > 0) {
    while($row = $result->fetch_assoc()) {

      if($row['accountAccLVL'] == 0)
      {
        $insertCheck = "<i class='fas fa-check' style='color: red'></i>";
      }else{
        $insertCheck = "<i class='fas fa-check' style='color: green'></i>";
      }
      echo
      "
      <tr>
        <th scope='row'> " .$row['accountID']. "</th>
        <td>" .$row['accountEmail']. "</td>
        <td>" .$insertCheck. "</td>";

      if($row['accountAccLVL'] == 1 && $row['accountAccLVL'] != 0)
      {
        echo "<td><a href='editAdminUser.php?id= " .$row['accountID']. "' style='text-decoration:none; color: grey'><i class='fas fa-edit'></i></a></td>";
        echo "<td><a href='../backend/deleteUser.php?id= " .$row['accountID']. "' style='text-decoration:none; color: red'><i class='fas fa-trash'></i></a></td>";
      }else{
        echo "<td></td>";
        echo "<td><a href='../backend/deleteUser.php?id= " .$row['accountID']. "' style='text-decoration:none; color: red'><i class='fas fa-trash'></i></a></td>";
      }
        echo "</tr>";
    }


  }

?>
