<?php
// initialize session on all pages requiring knowledge if user is logged in or not
session_start();
?>

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8" />
  <meta http-equiv="X-UA-Compatible" content="IE=edge" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>Play Therapy</title>
  <!--  favicon -->
  <link rel="icon" type="image/x-icon" href="images/favi2_L5I_icon.ico" />
  <!--  Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
  <!--  Font Awesome -->
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.13.0/css/all.min.css" integrity="sha256-h20CPZ0QyXlBuAw7A+KluUYx/3pK+c7lYEpqLTlxjYQ=" crossorigin="anonymous" />
  <!--  Google Fonts -->
  <link rel="preconnect" href="https://fonts.gstatic.com" />
  <link href="https://fonts.googleapis.com/css2?family=Noto+Sans:wght@400;700&display=swap" rel="stylesheet" />
  <!--  CSS -->
  <link rel="stylesheet" href="css/styles.css" />
</head>
<body>
  <nav class="navbar navbar-expand-lg">
    <a class="navbar-brand mx-auto" href="index.php"><img id="playLogo" src="images/logo.png" alt="playLogo" width="170" height="100" /><span>PLAY THERAPY TOYS <b>by Lenka De Villiers-Van Zyl</b></span>
    </a>
  </nav>
  <!-- Page container -->
  <div class="container-fluid" id="mainContainer">
    <!-- Main column where content goes  -->
    <div class="main">
      <!--Login content -->
      <div class="container-fluid" id="signInPage">
        <div class="container-fluid" id="signinMainContainer">
          <h1 id="signinHeading">Sign In</h1>
          <div class="row justify-content-center">
            <div class="col-sm-4"></div>
            <div class="col-sm-6" id="emailCenter">
              <form action= "backend/signIn.php" method="post">
                <div class="form-row" id="formRow">
                  <div class="form-group col-md-6 justify-content-center">
                    <label for="inputEmail" id="signinEmail">Email:</label>
                    <input name="email" type="email" class="form-control" id="inputEmail" placeholder="Enter email address" />
                  </div>
                </div>
                <div class="form-row" id="formRow">
                  <div class="form-group col-md-6">
                    <label for="inputPassword" id="signinPassword" placeholder="Enter password">Password:</label>
                    <input name="password" type="password" class="form-control" id="inputPassword" placeholder="Enter password" />
                  </div>
                </div>
                <button name="submit" value="submit" type="submit" class="btn btn-primary " id="signInButton">Sign in!</button>
                <a class="btn btn-light btn-sm " href="signUpScreen.php" role="button" id="signInLinkButton">Not registered yet? Sign up!</a>
              </form>
            </div>
          </div>
          <div class="col-sm-4"></div>
        </div>
      </div>
    </div>
  </div>
  <!--  Bootstrap and own scripts-->
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js" integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous"></script>
<script src="index.js" charset="utf-8"></script>
</body>

</html>
