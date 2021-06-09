<?php

require_once ("connDB.php");

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
location='../signInScreen.php';
   </script>";
   exit;
 }
   // Check if the user is already logged in, if yes then redirect to home screen where logged in
if(isset($_SESSION["login"]) && $_SESSION["login"] === true){
      echo "<script type='text/javascript'>alert('Already logged in!');
      location='../index.php';
      </script>";
      // closing the connection
      mysqli_close($conn);
      // terminate script
      exit;
    }

// check whether email exists or not by checking if row exists from result set
$query = "SELECT accountEmail FROM account WHERE accountEmail = '$email'";
$resultSet = mysqli_query($conn, $query);
if(mysqli_num_rows($resultSet) == 0) {
// message to inform user email does not exist and redirect to signupscreen
echo "<script type='text/javascript'>alert('Email does not exist. Please create an account');
location='../signUpScreen.php';
</script>";
// closing the connection
mysqli_close($conn);
// terminate script
exit;
};

//  check whether password matches hashed password of specific email returned by result set
$query2 = "SELECT * FROM account WHERE accountEmail = '$email' AND accountPasswordHash = '$hash'";
$resultSet2 = mysqli_query($conn, $query2);
if(mysqli_num_rows($resultSet2) == 0) {
// message to inform user password is incorrect and redirect back to signinscreen
echo "<script type='text/javascript'>alert('Incorrect password.');
location='../signInScreen.php';
</script>";
// closing the connection
mysqli_close($conn);
// terminate script
exit;
}else{
        // password and email matched, now get data of user to set session variables
        $row = mysqli_fetch_array($resultSet2);
        // set session uid to the user's account ID
        $_SESSION["uid"] = $row["accountID"];
        // set the auth level accordingly
        $_SESSION["authLVL"] = $row["accountAccLVL"];
        // set session login variable to true
        $_SESSION["login"] = true;
        // now check and set level of authentication.
      if ($_SESSION["authLVL"] == 0) {
            // login verified as user, direct to home screen where associated accountlevel is 0
            // set the session name to the user's email
            $_SESSION["name"] = "user";
            echo "<script type='text/javascript'>
            location='../index.php';
            </script>";
            // closing the connection
            mysqli_close($conn);
            // terminate script
            exit;
            }else{
                $_SESSION["name"] = "admin";
                // login verified as admin, direct to admin screen where associated accountlevel is 1
                // account level checked again at admin screen
                echo "<script type='text/javascript'>
                location='../admin.php';
                </script>";
                // closing the connection
                mysqli_close($conn);
                // terminate script
                exit;
              };
};


};

 ?>
