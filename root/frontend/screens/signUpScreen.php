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
  <!--  Font Awesome -->
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.13.0/css/all.min.css" integrity="sha256-h20CPZ0QyXlBuAw7A+KluUYx/3pK+c7lYEpqLTlxjYQ=" crossorigin="anonymous" />
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
            <div class="col-sm-3"></div>
            <div class="col-sm-6" id="emailShorten">
              <form>
                <div class="form-row">
                  <div class="form-group col-md-6 justify-content-center">
                    <label for="inputEmail">Email:</label>
                    <input type="email" class="form-control" id="inputEmail" placeholder="Enter email address" />
                  </div>
                  <div class="form-group col-md-6">
                    <label for="inputPassword" placeholder="Enter password">Password:</label>
                    <input type="password" class="form-control" id="inputPassword" placeholder="Enter password" />
                  </div>
                </div>
                <div class="form-row">
                  <div class="form-group col-md-6">
                    <label for="inputStreet">Street:</label>
                    <input type="text" class="form-control" id="inputStreet" placeholder="Enter street" />
                  </div>
                  <div class="form-group col-md-6">
                    <label for="inputCity">City:</label>
                    <input type="text" class="form-control" id="inputCity" placeholder="Enter city" />
                  </div>
                </div>
                <div class="form-row">
                  <div class="form-group col-md-6 pb-4">
                    <label for="inputProvince">Province:</label>
                    <select id="inputProvince" class="form-control">
                      <option selected>Choose...</option>
                      <option>Eastern Cape</option>
                      <option>Free State</option>
                      <option>Gauteng</option>
                      <option>KwaZulu-Natal</option>
                      <option>Limpopo</option>
                      <option>Mpumalanga</option>
                      <option>North West</option>
                      <option>Northern Cape</option>
                      <option>Western Cape</option>
                    </select>
                  </div>
                  <div class="form-group col-md-6">
                    <label for="inputCode">Code:</label>
                    <input type="text" class="form-control" id="inputCode" placeholder="Enter code" />
                  </div>
                </div>
                <button type="submit" class="btn btn-primary " id="signUpButton">Sign up!</button>
                <a class="btn btn-light btn-sm " href="signInScreen.php" role="button" id="signInLinkButton">Already registered? Sign in!</a>

              </form>
            </div>
          </div>
          <div class="col-sm-3"></div>
        </div>

      </div>
    </div>
  </div>
  <script src="index.js" charset="utf-8"></script>
</body>

</html>
