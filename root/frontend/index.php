<?php
// to display errors helpful during development
error_reporting(E_ALL);
ini_set('display_errors', '1');
require_once ('header.php');
?>

<!-- Page container -->
<div class="container-fluid">
  <!-- Main column where content goes  -->
  <div class="main">
    <!-- Search Bar and Image -->
    <div class="container-fluid" id="homeContainer">
      <div class="row">
        <div class="col-12 col-6-sm">
          <p class="subscript1">
            "Birds fly, fish swim, and children play."
          </p>
          <p class="subscript2">Dr. Gary Landreth</p>
        </div>
        <div class="col-12 col-6-sm">
          <div class="input-group mb-3" id="searchBar">
            <input type="text" class="form-control" />
            <div class="input-group-append">
              <button id="searchButton" class="btn btn-primary">
                <i class="fas fa-search"></i>
              </button>
            </div>
          </div>
        </div>
      </div>
    </div>

    <div class="container-fluid">
      <div class="row justify-content-center" id="browseLinksRow">
        <div class="col-6-auto" id="browseLinksP">
          <a class="btn btn-light btn-sm" href="./screens/productScreen.php" role="button" id="browseButton">Browse Books</a>
        </div>
        <div class="col-6-auto" id="browseLinksP">
          <a class="btn btn-light btn-sm" href="./screens/productScreen.php" role="button" id="browseButton">&nbsp; Browse Toys &nbsp;</a>
        </div>
      </div>
    </div>

    <div class="container-fluid" id="cardContainer">
      <div class="row justify-content-center" id="cardBox">
        <div class="col-12-sm col-6-md col-4-lg">
          <div class="card" style="width: 18rem; margin: 1rem">
            <img src=" ..." class="card-img-top" alt="..." />
            <div class="card-body">
              <h5 class="card-title">Card title</h5>
              <p class="card-text">
                Some quick example text to build on the card title and make
                up the bulk of the card's content.
              </p>
              <a href="#" class="btn btn-primary">Go somewhere</a>
            </div>
          </div>
        </div>
        <div class="col-12-sm col-6-md col-4-lg">
          <div class="card" style="width: 18rem; margin: 1rem">
            <img src=" ..." class="card-img-top" alt="..." />
            <div class="card-body">
              <h5 class="card-title">Card title</h5>
              <p class="card-text">
                Some quick example text to build on the card title and make
                up the bulk of the card's content.
              </p>
              <a href="#" class="btn btn-primary">Go somewhere</a>
            </div>
          </div>
        </div>
        <div class="col-12-sm col-6-md col-4-lg">
          <div class="card" style="width: 18rem; margin: 1rem">
            <img src=" ..." class="card-img-top" alt="..." />
            <div class="card-body">
              <h5 class="card-title">Card title</h5>
              <p class="card-text">
                Some quick example text to build on the card title and make
                up the bulk of the card's content.
              </p>
              <a href="#" class="btn btn-primary">Go somewhere</a>
            </div>
          </div>
        </div>
        <div class="col-12-sm col-6-md col-4-lg">
          <div class="card" style="width: 18rem; margin: 1rem">
            <img src=" ..." class="card-img-top" alt="..." />
            <div class="card-body">
              <h5 class="card-title">Card title</h5>
              <p class="card-text">
                Some quick example text to build on the card title and make
                up the bulk of the card's content.
              </p>
              <a href="#" class="btn btn-primary">Go somewhere</a>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
  <?php
    require_once ('footer.php');
  ?>
