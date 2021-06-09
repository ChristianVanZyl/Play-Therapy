<?php
if(isset($_POST["submit"])){
    // receiving address
    $to = "infoplaytherapytoyslvz@gmail.com";
    // sender's email address
    $from = $_POST["email"];
    $subject = $_POST["subject"];
    $message = $_POST["message"];

    $header = "From:" . $from;
    mail($to,$subject,$message,$header);
    echo "Thank you, we will contact you shortly.";
    echo "<script type='text/javascript'>
    location='../contactUs.php';
    </script>";
  }else{
    echo"error";
  }

?>
