<?php
// to display errors helpful during development
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
      <li class="breadcrumb-item active" aria-current="page" style="color: #95ab9e">About Us</li>
    </ol>
  </nav>
</div>
  <div class="container-fluid" id="aboutContainer">
    <div class= "row justify-content-center">
      <div class="col-sm-12 col-lg-6">

        <h2 id="aboutHeading">LENKA DE VILLIERS-VAN ZYL</h2>
        <h3 id="aboutheading2">Hons. Psych., MA Psych. Play Therapy (NWU)</h3>
        <h3 id="aboutheading2" style="padding-bottom: 3%;">Founder and owner of</h3>
        <h3 id="aboutheading2"><strong>Play Therapy Toys</strong></h3>
        <h3 id="aboutheading3"><strong>by Lenka De-Villiers Van Zyl</strong></h3><br>
        <p id="aboutPara">Lenka De Villiers-van Zyl has 8 years’ experience in working </p>
        <p id="aboutPara">with children from various backgrounds, presenting with a wide variety of challenges.</p>
        <p id="aboutPara">She believes in the resilience and uniqueness of all children, loves finding pathways</p>
        <p id="aboutPara">to their strengths, and assisting them in realizing their full potential.</p>
        <p id="aboutPara">Lenka provides play therapy services, but now also offers numerous play therapy </p>
        <p id="aboutPara">toys on her e-commerce website </p>

      </div>
  <div class="col-sm-12 col-lg-6">
    <div class="image-wrapper float-right">
  <img src="images/lenkaprofile.jpg" alt="profilepic"  width="90%" >
    </div>
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
