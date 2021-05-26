<?php
// destroy the session
if (session_destroy()){
  //redirect back to the signup page
  header("Location: ../frontend/screens/signUpScreen.php");
  exit;
}

?>
