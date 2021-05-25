<?php

$hostName = "localhost";
$databaseName = "playtherapy";
$username= "christian";
$password= "";

$conn = mysqli_connect($hostName, $username, $password, $databaseName);

 if(!$conn){
   echo "Connection failed " .mysqli_connect_error();
 }else{
   echo "connection success";
 }

 ?>
