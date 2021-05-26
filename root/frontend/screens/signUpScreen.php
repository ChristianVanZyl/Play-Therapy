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
  <!--  Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
  <!--  Font Awesome -->
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.13.0/css/all.min.css" integrity="sha256-h20CPZ0QyXlBuAw7A+KluUYx/3pK+c7lYEpqLTlxjYQ=" crossorigin="anonymous" />
  <!--  Google Fonts -->
  <link rel="preconnect" href="https://fonts.gstatic.com" />
  <link href="https://fonts.googleapis.com/css2?family=Noto+Sans:wght@400;700&display=swap" rel="stylesheet" />
  <!--  CSS -->
  <link rel="stylesheet" href="../css/styles.css" />

</head>

<body>
  <nav class="navbar navbar-expand-lg">
    <a class="navbar-brand mx-auto" href="../index.php"><img id="playLogo" src="../images/logo.png" alt="playLogo" width="170" height="100" /><span>PLAY THERAPY TOYS <b>by Lenka De Villiers-Van Zyl</b></span>
    </a>
  </nav>

  <!-- Page container -->
  <div class="container-fluid ">
    <!-- Main column where content goes  -->
    <div class="main">
      <!--Login content -->

      <div class="container-fluid" id="signUpPage">
        <div class="container-fluid" id="signupMainContainer">
          <h1 id="signupHeading">Sign Up</h1>
          <div class="row justify-content-center">
            <div class="col-sm-4"></div>
            <div class="col-sm-6" id="emailShorten">
              <form id="form" method="post" action="../../backend/signUp.php" onsubmit="return submitHandler()">
                <div class="form-row">
                  <div class="form-group col-6-md">
                    <label class="label" for="inputEmail">Email:</label>
                    <input name="email" type="email" class="form-control" id="inputEmail" placeholder="Enter email address" />
                    <div class="invalid-feedback">Please enter a valid email address.</div>
                  </div>
                  <div class="form-group col-6-md">
                    <label class="label" for="inputPassword">Password:</label>
                    <input name="password" type="password" class="form-control" id="inputPassword" placeholder="Enter password" />
                    <div class="invalid-feedback">Please enter a password with at least 8 characters, <br />1 digit and 1 uppercase, lowercase & special character.</div>
                  </div>
                </div>
                <div class="form-row">
                  <div class="form-group col-6-md">
                    <label class="label" for="inputStreet">Street:</label>
                    <input name="street" type="text" class="form-control" id="inputStreet" placeholder="Enter street" />
                    <div class="invalid-feedback">Please enter a street name.</div>
                  </div>
                  <div class="form-group col-6-md">
                    <label class="label" for="inputCity">City:</label>
                    <input name="city" type="text" class="form-control" id="inputCity" placeholder="Enter city" />
                    <div class="invalid-feedback">Please enter a city name.</div>
                  </div>
                </div>
                <div class="form-row">
                  <div class="form-group col-6-md pb-4">
                    <label class="label" for="inputProvince">Province:</label>
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
                  <div class="form-group col-6-md">
                    <label class="label" for="inputCode">Code:</label>
                    <input name="code" type="text" class="form-control" id="inputCode" placeholder="Enter code" />
                    <div class="invalid-feedback">Please enter a postal code comprised of digits</div>
                  </div>
                </div>
                <button name="submit" value="submit" type="submit" class="btn btn-primary " id="signUpButton">Sign up!</button>
                <a class="btn btn-light btn-sm " href="signInScreen.php" role="button" id="signUpLinkButton">Already registered? Sign in!</a>
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
  <script src="../index.js" charset="utf-8"></script>
</body>

</html>
