<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8" />
  <meta http-equiv="X-UA-Compatible" content="IE=edge" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>Play Therapy</title>
  <!--  Bootstrap CDN -->
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous" />
  <script src="https://code.jquery.com/jquery-3.4.1.slim.min.js" integrity="sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n" crossorigin="anonymous"></script>
  <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
  <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js" integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous"></script>
  <!--  Google Fonts -->
  <link rel="preconnect" href="https://fonts.gstatic.com" />
  <link href="https://fonts.googleapis.com/css2?family=Noto+Sans:wght@400;700&display=swap" rel="stylesheet" />
  <link href="https://fonts.googleapis.com/css2?family=Lato:ital,wght@0,700;1,300&display=swap" rel="stylesheet">
  <!--  Font Awesome -->
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.13.0/css/all.min.css" integrity="sha256-h20CPZ0QyXlBuAw7A+KluUYx/3pK+c7lYEpqLTlxjYQ=" crossorigin="anonymous" />
  <!--  CSS -->
  <link rel="stylesheet" href="./css/styles.css" />
</head>

<body>
  <!--  Header code inserted below-->
  <div class="fixed-top">
    <nav class="navbar navbar-expand-lg ">
      <a class="navbar-brand" href="#"><img id="playLogo" src="./images/logo.png" alt="playLogo" width="170" height="100" /><span>PLAY THERAPY TOYS <b>by Lenka De Villiers-Van Zyl</b></span>
      </a>
      <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>

      <!--  Check whether user is logged in or not, displays different nav links depending, with login or username displayed-->
      <div class="collapse navbar-collapse mr-auto" id="navbarSupportedContent">
        <ul class="navbar-nav ml-auto">
          <li class="nav-item">
            <a class="nav-link active" aria-current="page" href="./screens/productScreen.html">Browse</a>
          </li>
          <li class="nav-item ">
            <a class="nav-link" href="https://playtherapies.co.za/blog/">Blog</a>
          </li>
          <li class="nav-item ">
            <a class="nav-link" href="./screens/productScreen.php">About</a>
          </li>
          <li class="nav-item ">
            <a class="nav-link" href="./screens/productScreen.php">Contact Us</a>
          </li>
          <li class="nav-item ">
            <a class="nav-link" href="./screens/signUpScreen.php">Sign Up</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="./screens/signInScreen.php">Login</a>
          </li>
        </ul>
      </div>
    </nav>
  </div>
