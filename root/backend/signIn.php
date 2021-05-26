<?php
// require once so that file is read once and not multiple times, prevent wasteful multiple disk access
require_once ("loginDB.php");
// initialize session on all pages requiring knowledge if user is logged in or not
session_start();
// create new object conn. Calls new instance of mysqli function, using values from loginDB
$conn = mysqli_connect($hostName, $username, $password, $databaseName);
// connect_error is a property of the conn object, if it has a value, the die function is called to terminate the program
 if($conn->connect_error) {
   // the error is not written to console after dev is completed, because can give hackers information in certain circumstances
   die("Fatal Error");
 }

 // Check if the user is already logged in, if yes then redirect to home screen where logged in
 if(isset($_SESSION["login"]) && $_SESSION["login"] === true){
   echo "<script type='text/javascript'>alert('Already logged in!');
   location='../frontend/index.php';
   </script>";
   // closing the connection
   mysqli_close($conn);
   // terminate script
   exit();
 }

if(isset($_POST["submit"])){
// get the email and password from the submit form
$email = $_POST["email"];
$password = $_POST["password"];

// protection from mysql injection by using realescapestring
$email = mysqli_real_escape_string($conn, $email);
$password = mysqli_real_escape_string($conn, $password);
/* MD5 hash of password. The hash was saved in database, not entered password.
  So now during login we need to fetch the hash from the database and compare it to the
  hash of the entered password.
 */
$hash = md5($password);

// check whether email exists or not by checking if row exists in result set
$query = mysqli_query($conn, "SELECT accountEmail FROM account WHERE accountEmail = '$email'");
if(mysqli_num_rows($query) == 0) {
// message to inform user email does not exist and redirect to signupscreen
echo "<script type='text/javascript'>alert('Email does not exist. Please create an account');
location='../frontend/screens/signUpScreen.php';
</script>";
// closing the connection
mysqli_close($conn);
// terminate script
exit();
};

//  check whether password matches hashed password of specific email returned by result set
$query2 = mysqli_query($conn, "SELECT * FROM account WHERE accountEmail = '$email' AND accountPasswordHash = '$hash'");
if(mysqli_num_rows($query2) == 0) {
// message to inform user password is incorrect and redirect back to signinscreen
echo "<script type='text/javascript'>alert('Incorrect password.');
location='../frontend/screens/signInScreen.php';
</script>";
// closing the connection
mysqli_close($conn);
// terminate script
exit();
}else{
  // set loggedIn variable for session;
   $_SESSION["login"] = true;
  // login verified direct to home screen where logged in
  echo "<script type='text/javascript'>
  location='../frontend/index.php';
  </script>";
  // closing the connection
  mysqli_close($conn);
  // terminate script
  exit;
};




}







 ?>
