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

if(isset($_POST["submit"])){
$email = $_POST["email"];
$password = $_POST["password"];
$street = $_POST["street"];
$city = $_POST["city"];
$province = $_POST["province"];
$code = $_POST["code"];
// Data sanitization
// protection from mysql injection by using realescapestring
$email = mysqli_real_escape_string($conn, $email);
$password = mysqli_real_escape_string($conn, $password );

$province = mysqli_real_escape_string($conn, $province );
$code = mysqli_real_escape_string($conn, $code);
/* MD5 hash of password, this is saved in database, not entered password.
  During login, the hash is fetched from the database, the password entered by
  the user is hashed again and then the two hashed elements are compared.
 */
$hash = md5($password);

// query to insert form data into database, into table account for registration
$updateReq = "UPDATE account SET accountEmail = '$email',  accountPasswordHash = '$hash', accountStreet = '$street', accountCity = '$city', accountProvince = '$province', accountPostalCode = '$code' WHERE accountID = '$id'";


if(mysqli_query($conn, $updateReq )){
  // closing the connection

  mysqli_close($conn);
  echo "<script type='text/javascript'>alert('Successfully updated admin');
  location='../editAccounts.php';
  </script>";
  exit;
} else{

echo("Error description: " . mysqli_error($conn));
mysqli_close($conn);

  exit;
}
};



?>
