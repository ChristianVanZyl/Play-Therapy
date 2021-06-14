<?php
error_reporting(E_ALL);
ini_set("display_errors", "1");

if(isset($_POST["submit"])){
    // receiving address
    $to = "infoplaytherapytoyslvz@gmail.com";
    // sender's email address
    $from = $_POST["email"];
    $subject = $_POST["subject"];
    $message = $_POST["message"];
    // header to display from the domain sending from (which is infoplay),
    // who sent it and who you should reply to ($from customer's email address)
    $headers = 'From: infoplaytherapytoyslvz@gmail.com' . "\r\n" .
        'Reply-To: ' . $from . "\r\n" .
        'X-Mailer: PHP/' . phpversion();

    if(mail($to,$subject,$message,$headers)){
      echo "<script type='text/javascript'>alert('Thank you, we will contact you shortly.');
      location='../contactUs.php';
      </script>";
    }else{
      echo  "error";
    };
}

?>
