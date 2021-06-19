<?php
error_reporting(E_ALL);
ini_set("display_errors", "1");
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
<body id="prodBody">
  <?php
  require_once ("header.php");
  ?>
<!-- Page container -->

<div class="container-fluid" style="  padding-top: 140px;">
  <nav aria-label="breadcrumb" id="breadCustom">
    <ol class="breadcrumb">
      <li class="breadcrumb-item"><a href="/" id="breadLink">Home</a></li>
          <li class="breadcrumb-item active" aria-current="page" style="color: #95ab9e">My Profile</li>

    </ol>
  </nav>
</div>
<div class='prodMainunderlineDiv'>  </div>


 <div class="container-fluid" style="padding-top: 10%; padding-left: 20%; padding-right: 10%; padding-bottom: 10%; ">

 <div class="row">

   <div class="col-sm-12 col-md-6">
        <h6 style="text-align: left; font-size: 20px; padding-bottom: 2%;">Account Details:</h6>
        <?php

        // require once so that file is read once and not multiple times, prevent wasteful multiple disk access
        require_once ("backend/connDB.php");

        // create new object conn. Calls new instance of mysqli function, using values from loginDB
        $conn = mysqli_connect($hostName, $username, $password, $databaseName);
        // connect_error is a property of the conn object, if it has a value, the die function is called to terminate the program
        if($conn->connect_error) {
          // the error is not written to console after dev is completed, because can give hackers information in certain circumstances
          die("Fatal Error");
        };

        if(isset($_SESSION['uid'])) {
            $id = $_SESSION['uid'];
        }
        else {
            echo "Index not present";
        }

        $accountInfo = "SELECT * FROM account WHERE accountID = $id";
        $result = $conn->query($accountInfo);


         if ($result) {
           while($row = $result->fetch_assoc()) {
             echo
                '<form id="profileAccountform" method="post" action="backend/changeAccountDetails.php"  onsubmit="return accountSubmitHandler()">
                <div class="form-row">
                  <div class="form-group col-6-md">
                    <label class="label" for="inputEmail">Email:</label>
                     <input disabled="disabled" name="email" type="email" class="form-control" id="inputEmail" value= "' . $row['accountEmail'] . '"/>
                  </div>
                  <div class="form-group col-6-md">
                    <label class="label" for="inputPassword">Password:</label>
                    <input disabled="disabled" name="password" type="password" class="form-control" id="inputPassword"/>
                    <div class="invalid-feedback">Please enter a password with at least 8 characters, <br />1 digit and 1 uppercase, lowercase & special character.</div>
                  </div>
                </div>
                  <button  name="button" type="button" class="btn btn-primary" id="checkIfChangePassword">Edit password</button>
                  <button  disabled="disabled" name="submit" value="submit" type="submit" class="btn btn-primary " id="changePasswordButton">Change password</button>
                </form>
                ';
           };

        };
        ?>
   </div>

   <div class="col-sm-12 col-md-6">

      <h6 style="text-align: left; font-size: 20px; padding-bottom: 2%;">Shipping Address:</h6>
     <?php

     if(isset($_SESSION['uid'])) {
         $id = $_SESSION['uid'];
     }
     else {
         echo "Index not present";
     }

     $accountInfo = "SELECT * FROM account WHERE accountID = $id";
     $result = $conn->query($accountInfo);


      if ($result) {
        while($row = $result->fetch_assoc()) {
          echo
             '<form id="shippingform" method="post" action="backend/changeShippingDetails.php"  onsubmit="return shippingSubmitHandler()">
               <div class="form-row">
                 <div class="form-group col-6-md">
                   <label class="label" for="inputStreet">Street:</label>
                   <input name="street" type="text" class="form-control" id="inputStreet" value= "' . $row['accountStreet'] . '"/>
                   <div class="invalid-feedback">Please enter a street name.</div>
                 </div>
                 <div class="form-group col-6-md">
                   <label class="label" for="inputCity">City:</label>
                   <input name="city" type="text" class="form-control" id="inputCity" value= "' . $row['accountCity'] . '" />
                   <div class="invalid-feedback">Please enter a city name.</div>
                 </div>
               </div>
               <div class="form-row">
                 <div class="form-group col-6-md pb-4">
                   <label class="label" for="inputProvince">Province:</label>
                   <select name="province" id="inputProvince" class="form-control">
                     <option selected>"' . $row['accountProvince'] . '"</option>
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
                   <input name="code" type="text" class="form-control" id="inputCode" value= "' . $row['accountPostalCode'] . '"/>
                   <div class="invalid-feedback">Please enter a postal code comprised of digits</div>
                 </div>
               </div>
               <button  name="submit" value="submit" type="submit" class="btn btn-primary " id="signUpButton">Change shipping details</button>
             </form>';
        };

     };
     ?>

</div>
</div>

</div>



<?php
require_once ("footer.php");
?>

<!--  Page container end-->

<!--  Bootstrap and own scripts-->
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js" integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous"></script>
<script src="index.js" charset="utf-8"></script>
</body>

</html>
