<?php
  // destroy the session and redirect to home screen

session_destroy();
echo "<script type='text/javascript'>
location='../frontend/screens/signInScreen.php';
</script>";
exit();
 ?>
