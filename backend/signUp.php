<?php
// require once so that file is read once and not multiple times, prevent wasteful multiple disk access
require_once ("connDB.php");
// for error reporting, useful during development, should be deactivated on proper launch of website
error_reporting(E_ALL);
ini_set("display_errors", "1");
// initialize session on all pages to have access to session variables initialized thus far
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
// data received on clicking submit (POST REQUEST )on signup page on client side.
// data has been validated by javascript already
if(isset($_POST["submit"])){
$accountACCLVL =  0;
$email = $_POST["email"];
$password = $_POST["password"];
$street = $_POST["street"];
$city = $_POST["city"];
$province = $_POST["province"];
$code = $_POST["code"];
// Data sanitization
// protection from mysql injection by using realescapestring
$email = mysqli_real_escape_string($conn, $email );
$password = mysqli_real_escape_string($conn, $password );

// check whether email already exists or not by checking if row exists from result set
$query = "SELECT accountEmail FROM account WHERE accountEmail = '$email'";
$resultSet = mysqli_query($conn, $query);
if(mysqli_num_rows($resultSet) != 0) {
// message to inform user email does not exist and redirect to signupscreen
echo "<script type='text/javascript'>alert('Email exist. Please use another email for new account');
location='../signUpScreen.php';
</script>";
// closing the connection
mysqli_close($conn);
// terminate script
exit;
};

/* MD5 hash of password, this is saved in database, not the entered password.
  During login, the hash is fetched from the database, the password entered by
  the user is hashed again and then the two hashed elements are compared. If the
  hashes match, the password entered is thus the same as the hashed password stored
  and access to the account is granted.

  Even if the database is thus breached by a hacker, they cannot do much with
  the hashed password. Entering the hash into the password input field will hash
  the hashed password, leading to a different hash altogether and not matching
  with the stored hash in the database linked to a specific email account. 
 */
$hash = md5($password);

// query to insert form data into database, into table account for registration
$query2 = "INSERT INTO account (accountAccLVL, accountEmail, accountPasswordHash, accountStreet, accountCity, accountProvince, accountPostalCode) VALUES ('$accountACCLVL', '$email', '$hash', '$street', '$city', '$province', '$code')";
if(mysqli_query($conn, $query2)){
    echo "Success";
} else{
    echo "Failure: $query2. " . mysqli_error($conn);
}
// closing the connection
mysqli_close($conn);
}
// redirect with a js script to the sign in screen
echo "<script type='text/javascript'>location='../signInScreen.php';
</script>";
// terminate script
exit;
 ?>
