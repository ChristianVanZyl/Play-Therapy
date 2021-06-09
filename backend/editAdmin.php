<?php

// require once so that file is read once and not multiple times, prevent wasteful multiple disk access
require_once ("connDB.php");
session_start();
// create new object conn. Calls new instance of mysqli function, using values from loginDB
$conn = mysqli_connect($hostName, $username, $password, $databaseName);
// connect_error is a property of the conn object, if it has a value, the die function is called to terminate the program
 if($conn->connect_error) {
   // the error is not written to console after dev is completed, because can give hackers information in certain circumstances
   die("Fatal Error");
 };

 $id = '';
 if(isset( $_GET['id'])) {
     $id = $_GET['id'];
 }

$accountInfo = "SELECT * FROM account WHERE accountID = $id";
$result = $conn->query($accountInfo);


  if ($result) {
    while($row = $result->fetch_assoc()) {
      echo
         '<form id="adminform" method="post" action="backend/updateUser.php?id= ' .$row['accountID']. '"   onsubmit="return adminSubmitHandler()">
           <div class="form-row">
             <div class="form-group col-6-md">
               <label class="label" for="inputEmail">Email:</label>
               <input name="email" type="email" class="form-control" id="inputEmail" value= "' . $row['accountEmail'] . '"/>
               <div class="invalid-feedback">Please enter a valid email address.</div>
             </div>
             <div class="form-group col-6-md">
               <label class="label" for="inputPassword">Password:</label>
               <input name="password" type="password" class="form-control" id="inputPassword" />
               <div class="invalid-feedback">Please enter a password with at least 8 characters, <br />1 digit and 1 uppercase, lowercase & special character.</div>
             </div>
           </div>
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
           <button  name="submit" value="submit" type="submit" class="btn btn-primary " id="signUpButton">Change Details</button>
         </form>
         </div>
       </div>
       <div class="col-sm-3"></div>
     </div>

 <!--  Bootstrap and own scripts-->
 <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
 <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
 <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js" integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous"></script>
 <script src="index.js" charset="utf-8"></script>';

    };

};

mysqli_close($conn);

  exit;


?>
