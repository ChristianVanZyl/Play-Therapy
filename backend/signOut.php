<?php
  // destroy the session and redirect to home screen
session_start();
$params = session_get_cookie_params();
setcookie(session_name(), '', 0, $params['path'], $params['domain'], $params['secure'], isset($params['httponly']));

 if (isset($_SESSION)) {
            session_destroy();

        };

        // Expire all of the user's cookies for this domain:
        // give them a blank value and set them to expire
        // in the past
if (isset($_SERVER['HTTP_COOKIE'])) {
  $cookies = explode(';', $_SERVER['HTTP_COOKIE']);
  foreach($cookies as $cookie) {
        $parts = explode('=', $cookie);
        $name = trim($parts[0]);
        setcookie($name, '', time()-1000);
        setcookie($name, '', time()-1000, '/');
  };
}






header("Location: ../index.php");
exit;


?>
