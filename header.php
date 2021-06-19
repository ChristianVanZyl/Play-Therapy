


  <!--  Header code inserted below-->
  <div class="fixed-top">
    <nav class="navbar navbar-expand-lg ">
      <a class="navbar-brand" href="index.php"><img id="playLogo" src="images/logo.png" alt="playLogo" width="170" height="100" /><span>PLAY THERAPY TOYS <b>by Lenka De Villiers-Van Zyl</b></span>
      </a>
      <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>

      <!--  Check whether user is logged in or not, displays different nav links depending, with login or username displayed-->
      <div class="collapse navbar-collapse mr-auto" id="navbarSupportedContent">
        <ul class="navbar-nav ml-auto">
          <li class="nav-item">
            <a class="nav-link active" aria-current="page" href="productViewScreen.php">Browse</a>
          </li>
          <li class="nav-item ">
            <a class="nav-link" href="https://playtherapies.co.za/blog/">Blog</a>
          </li>
          <li class="nav-item ">
            <a class="nav-link" href="contactUs.php">Contact Us</a>
          </li>
          <li class="nav-item ">
            <a class="nav-link" href="aboutUs.php" id="aboutNav">About</a>
          </li>
          <?php if(isset($_SESSION["cartQuantity"])) {
            echo "<li class='nav-item '>
            <a class='nav-link' href='cartScreen.php'> <i class='fa badge' style='font-size:24px;  padding-left: 0;' value=" .$_SESSION['cartQuantity']. ">&#xf07a;</i>Cart</a>
          </li>";}else{
            echo  "<li class='nav-item '>
                <a class='nav-link' href='cartScreen.php'> <i class='fa badge' style='font-size:24px;  padding-left: 0;'>&#xf07a;</i>Cart</a>
              </li>";
          }
          ?>
          <?php
          if (isset($_SESSION["name"]) && $_SESSION["name"] === "user") {
          	echo  "<li class='nav-item dropdown'> <a class='nav-link dropdown-toggle' href='#' id='navbarDropdownMenuLink' data-toggle='dropdown' aria-haspopup='true' aria-expanded='false'>
        <i class='far fa-user  p-2'></i>Profile
        </a>
        <div class='dropdown-menu' aria-labelledby='navbarDropdownMenuLink'>
        <a class='dropdown-item' href='profileScreen.php'>Profile</a>
        <a class='dropdown-item' href='profileOrderScreen.php'>My Orders</a>
        <a class='dropdown-item' href='backend/signOut.php'>Sign Out</a>
        </div>
            </li>";}
        else {
          echo "<li class='nav-item'><a class='nav-link' href='signUpScreen.php'>Sign Up</a>
            </li>
            <li class='nav-item'>
              <a class='nav-link' href='signInScreen.php'>Sign In</a>
            </li>";}
          ?>
        </ul>
      </div>
    </nav>
  </div>
