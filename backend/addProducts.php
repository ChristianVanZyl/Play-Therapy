<?php
// require once so that file is read once and not multiple times, prevent wasteful multiple disk access
require_once ("connDB.php");
error_reporting(E_ALL);
ini_set("display_errors", "1");
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
$category = $_POST["categoryID"];
$prodName = $_POST["productName"];
$prodType = $_POST["prodType"];
$prodPrice = $_POST["prodprice"];
$prodQuantity = $_POST["prodQuantity"];

// image uploaded needs to be processed
if(!empty($_FILES["prodImg"]["name"])) {
        // Get file info
        $fileName = basename($_FILES["prodImg"]["name"]);
        $fileType = pathinfo($fileName, PATHINFO_EXTENSION);

        // Allow certain file formats
        $allowTypes = array('jpg','png','jpeg','gif');
        if(in_array($fileType, $allowTypes)){
            $image = $_FILES['prodImg']['tmp_name'];
            $imgContent = addslashes(file_get_contents($image));
}}


// query to insert product data into database, into product table
$query = "INSERT INTO product (categoryID, productName, prodType, prodprice, prodQuantity, prodImg) VALUES ('$category', '$prodName', '$prodType', '$prodPrice', '$prodQuantity', '$imgContent')";
if(mysqli_query($conn, $query)){
  // closing the connection
  mysqli_close($conn);
  echo "<script type='text/javascript'>alert('Successfully updated product!');
  location='../editProducts.php';
  </script>";
  exit;
} else{

echo("Error description: " . mysqli_error($conn));
mysqli_close($conn);
exit;
}};

// terminate script

 ?>
