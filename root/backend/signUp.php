<?php
// require once so that file is read once and not multiple times, prevent wasteful multiple disk access
require_once ("loginDB.php");
// create new object conn. Calls new instance of mysqli function, using values from loginDB
$conn = mysqli_connect($hostName, $username, $password, $databaseName);
// connect_error is a property of the conn object, if it has a value, the die function is called to terminate the program
 if($conn->connect_error) {
   // the error is not written to console after dev is completed, because can give hackers information in certain circumstances
   die("Fatal Error");
 }else {
   echo "connection success";
 };

if(isset($_POST["submit"])){
$accountACCLVL =  0;
$email = $_POST["email"];
$password = $_POST["password"];
$street = $_POST["street"];
$city = $_POST["city"];
$province = $_POST["province"];
$code = $_POST["code"];
// protection from mysql injection by using realescapestring
$email = mysqli_real_escape_string($conn, $email );
$password = mysqli_real_escape_string($conn, $password );

// check whether email already exists or not by checking if row exists in result set
$query = mysqli_query($conn, "SELECT accountEmail FROM account WHERE accountEmail = '".$_POST['email']."'");
if(mysqli_num_rows($query)) {
// message to inform user email in use and redirect back to signupscreen
echo "<script type='text/javascript'>alert('This email is already in use. Please enter another email address');
location='../frontend/screens/signUpScreen.php';
</script>";
// closing the connection
mysqli_close($conn);
exit();
};

/* MD5 hash of password, this is saved in database, not entered password.
  During login, the hash is fetched from the database, the password entered by
  the user is hashed again and then the two hashed elements are compared.
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

header("Location: ../frontend/screens/signInScreen.php");
exit();

 ?>
