<?php

$hostName = "localhost";
$databaseName = "playtherapy";
$username= "christian";
$password= "123";

$databaseHandler;
$statement;
$result;
$conn = mysqli_connect($hostName, $username, $password, $databaseName);

 if(!$conn){
   echo "Connection failed " .mysqli_connect_error();
 }

 ?>
