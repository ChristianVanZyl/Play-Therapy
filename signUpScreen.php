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
    <!-- Very basic navbar containing only a link to the home page when clicking on the image/heading -->
  <nav class="navbar navbar-expand-lg">
    <a class="navbar-brand mx-auto" href="index.php"><img id="playLogo" src="images/logo.png" alt="playLogo" width="170" height="100" /><span>PLAY THERAPY TOYS <b>by Lenka De Villiers-Van Zyl</b></span>
    </a>
  </nav>
  <!-- Page container -->
  <!-- Container fluid used to make sure that the container spreads 100% across the screen and used in conjunction with certain heading types for dynamic positioning and sizing-->
  <div class="container-fluid" id="mainContainer">
    <!-- Main column where content goes  -->
    <div class="main">
      <!--Sign up content -->
          <div class="container-fluid" id="signUpPage">
        <div class="container-fluid" id="signupMainContainer" style="padding-top: 100px;">
          <h1 id="signupHeading">Sign Up</h1>
            <!--content in row is centered by adding the justify content center to the class name -->
          <div class="row justify-content-center">
            <!--as a screen consists of 12 columns, empty divs with column size specified are used to center the actual content on the page -->
            <div class="col-sm-4"></div>
            <div class="col-sm-6" id="emailShorten">
              <!--sign up form that, when posted, goes to the backend/signup.php page. The submithandler firstly verifies that the input
              fields contains valid data and only then allows for posting -->
              <form id="form" method="post" action="backend/signUp.php" onsubmit="return submitHandler()">
                <!--just as bootstrap rows and columns are used elsewhere, it can be added to the form class to structure the form's layout -->
                <div class="form-row">
                  <!--by adding sm-12 one specifies that multiple columns should break down and appear beneath each other on screens small and up -->
                  <div class="form-group col-sm-12">
                    <label class="label" for="inputEmail">Email:</label>
                    <input name="email" type="email" class="form-control" id="inputEmail" placeholder="Enter email address" />
                    <!-- the invalid-feedback class is hidden. With javascript validation the invalid-feedback class is shown if the data input is incorrect -->
                    <div class="invalid-feedback">Please enter a valid email address.</div>
                  </div>
                  <div class="form-group col-sm-12">
                    <label class="label" for="inputPassword">Password:</label>
                    <input name="password" type="password" class="form-control" id="inputPassword" placeholder="Enter password" />
                    <div class="invalid-feedback">Please enter a password with at least 8 characters, <br />1 digit and 1 uppercase, lowercase & special character.</div>
                  </div>
                </div>
                <div class="form-row">
                  <div class="form-group col-sm-12">
                    <label class="label" for="inputStreet">Street:</label>
                    <input name="street" type="text" class="form-control" id="inputStreet" placeholder="Enter street" />
                    <div class="invalid-feedback">Please enter a street name.</div>
                  </div>
                  <div class="form-group col-sm-12">
                    <label class="label" for="inputCity">City:</label>
                    <input name="city" type="text" class="form-control" id="inputCity" placeholder="Enter city" />
                    <div class="invalid-feedback">Please enter a city name.</div>
                  </div>
                </div>
                <div class="form-row">
                  <div class="form-group col-sm-12 pb-4">
                    <label class="label" for="inputProvince">Province:</label>
                  <!-- dropdown menu where one lists the options. By using 'disabled' the first option cannot be selected, and is thus a placeholder only. It is
                  also the first option appearing because of the 'selected' keyword-->
                    <select name="province" id="inputProvince" class="form-control">
                      <option disabled selected>Choose...</option>
                      <option value="Eastern Cape">Eastern Cape</option>
                      <option value="Free State">Free State</option>
                      <option value="Gauteng">Gauteng</option>
                      <option value="KwaZulu-Natal">KwaZulu-Natal</option>
                      <option value="Limpopo">Limpopo</option>
                      <option value="Mpumalanga">Mpumalanga</option>
                      <option value="North West">North West</option>
                      <option value="Northern Cape">Northern Cape</option>
                      <option value="Western Cape">Western Cape</option>
                    </select>
                    <div class="invalid-feedback">Please choose a province</div>
                  </div>
                  <div class="form-group col-sm-12">
                    <label class="label" for="inputCode">Code:</label>
                    <input name="code" type="text" class="form-control" id="inputCode" placeholder="Enter code" />
                    <div class="invalid-feedback">Please enter a postal code comprised of digits</div>
                  </div>
                </div>
                <!-- upon clicking this button the form is first passed to the javascript handler that checks validation. If any input field does not pass validation,
                event.Default function activates behind the scenes to ensure that the default function of the button, submitting a form, is not performed. If it passes
                validation, it is posted and the backend signUp.php script is executed -->
                <button name="submit" value="submit" type="submit" class="btn btn-primary " id="signUpButton">Sign up!</button>
                <!-- link button that a user can click on if they are already registered, redirects to sign in screen-->
                <a class="btn btn-light btn-sm " href="signInScreen.php" role="button" id="signUpLinkButton">Already registered? Sign in!</a>
              </form>
            </div>
          </div>
          <div class="col-sm-4"></div>
        </div>
    </div>
  </div>
</div>
    <!--  Bootstrap and own javascript file-->
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
  <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js" integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous"></script>
  <script src="index.js" charset="utf-8"></script>
</body>

</html>
