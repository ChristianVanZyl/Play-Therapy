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
 if( isset( $_GET['id'])) {
     $id = $_GET['id'];
 }

$productInfo = "SELECT * FROM product WHERE productID = $id";
$result = $conn->query($productInfo);


  if ($result) {
    while($row = $result->fetch_assoc()) {
      echo
         '<form id="editform" method="post" action="backend/updateProduct.php?id= ' .$row['productID']. '"   enctype="multipart/form-data" onsubmit="return productSubmitHandler()">
           <div class="form-row">
             <div class="form-group col-6-md">
               <label class="label" for="inputCategoryID">Category:</label>
               <input name="categoryID" type="text" style="width: 100px" class="form-control" id="inputCategory" value= "' . $row['categoryID'] . '"/>
               <div class="invalid-feedback">Please enter a valid category.</div>
             </div>
             <div class="form-group col-6-md">
               <label class="label" for="inputProdName">Product Name:</label>
               <input name="productName" type="text" style="width: 420px"  class="form-control" id="inputProdName" value="' . $row['productName'] . '"/>
               <div class="invalid-feedback">Please enter a product name.</div>
             </div>
           </div>
           <div class="form-row">
             <div class="form-group col-6-md">
               <label class="label" for="inputProdType">Type:</label>
               <input name="prodType" type="text" style="width: 400px" class="form-control" id="inputProdType" value= "' . $row['prodType'] . '"/>
               <div class="invalid-feedback">Please enter product type.</div>
             </div>
             <div class="form-group col-6-md">
               <label class="label" for="inputPrice">Price:</label>
               <input name="prodprice" type="text" style="width: 120px" class="form-control" id="inputPrice" value= "' . $row['prodprice'] . '" />
               <div class="invalid-feedback">Please enter a valid price.</div>
             </div>
           </div>
           <div class="form-row">
             <div class="form-group col-6-md">
               <label class="label" for="inputQuantity">Quantity:</label>
               <input name="prodQuantity" type="number" style="width: 80px" class="form-control" id="inputQuantity" value= "' . $row['prodQuantity'] . '"/>
               <div class="invalid-feedback">Please select a valid quantity.</div>
             </div>
           <div class="form-group col-6-md">
             <label class="label" for="inputQuantity">Image upload:</label>
             <input name="prodImg" type="file" style="width: 300px" class="form-control" id="inputImg" />
             <div class="invalid-feedback">Please select a valid file.</div>
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
