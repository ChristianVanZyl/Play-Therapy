<?php
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

$id = $_GET["id"];
// sql to delete a record
$query = "DELETE FROM account WHERE accountID = $id";

if (mysqli_query($conn, $query)) {
    mysqli_close($conn);
    header("Location: ../editAccounts.php");
    exit;
} else {
  mysqli_close($conn);
    echo "Error deleting record";
    exit;

}

// terminate script


?>
