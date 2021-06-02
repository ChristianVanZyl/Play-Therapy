<?php
// require once so that file is read once and not multiple times, prevent wasteful multiple disk access
require_once ("connDB.php");
// initialize session on all pages requiring knowledge if user is logged in or not
session_start();
// create new object conn. Calls new instance of mysqli function, using values from loginDB
$conn = mysqli_connect($hostName, $username, $password, $databaseName);
// connect_error is a property of the conn object, if it has a value, the die function is called to terminate the program
 if($conn->connect_error) {
   // the error is not written to console after dev is completed, because can give hackers information in certain circumstances
   die("Fatal Error");
 }

if(isset($_POST["submit"])){
// get the email and password from the submit form
$email = $_POST["email"];
$password = $_POST["password"];

// Data sanitization
// protection from mysql injection by using realescapestring
$email = mysqli_real_escape_string($conn, $email);
$password = mysqli_real_escape_string($conn, $password);
/* MD5 hash of password. The hash was saved in database, not entered password.
  So now during login we need to fetch the hash from the database and compare it to the
  hash of the entered password.
 */
$hash = md5($password);

//Check whether both fields have been filled in

 if (empty($_POST["email"]) || empty($_POST["password"])) {
   echo "<script type='text/javascript'>alert('Please fill in both fields!');
location='../frontend/screens/signInScreen.php';
   </script>";
 }else{
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

// check whether email exists or not by checking if row exists from result set
$query = "SELECT accountEmail FROM account WHERE accountEmail = '$email'";
$resultSet = mysqli_query($conn, $query);
if(mysqli_num_rows($resultSet) == 0) {
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
$query2 = "SELECT * FROM account WHERE accountEmail = '$email' AND accountPasswordHash = '$hash'";
$resultSet2 = mysqli_query($conn, $query2);
if(mysqli_num_rows($resultSet2) == 0) {
// message to inform user password is incorrect and redirect back to signinscreen
echo "<script type='text/javascript'>alert('Incorrect password.');
location='../frontend/screens/signInScreen.php';
</script>";
// closing the connection
mysqli_close($conn);
// terminate script
exit();
}else{
  // check level of authentication
  $userLoggedIn = mysqli_fetch_assoc($resultSet2);
			if ($userLoggedIn["accountAccLVL"] == 0) {
				$_SESSION["user"] = $userLoggedIn;
        // login verified as user, direct to home screen where associated accountlevel is 0
        echo "<script type='text/javascript'>
        location='../frontend/index.php';
        </script>";
        // closing the connection
        mysqli_close($conn);
        // terminate script
        exit;
      }else{
        $_SESSION["admin"] = $userLoggedIn;
        // login verified as admin, direct to admin screen where associated accountlevel is 1
        echo "<script type='text/javascript'>
        location='../frontend/admin.php';
        </script>";
        // closing the connection
        mysqli_close($conn);
        // terminate script
        exit;
      };
}
}}
 ?>
