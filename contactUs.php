<?php
// to display errors helpful during development
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
      <li class="breadcrumb-item active" aria-current="page" style="color: #95ab9e">Contact Us</li>
    </ol>
  </nav>
</div>

  <div class="container-fluid" id="contactUsContainer">
    <div class= "row">
            <div class="col-sm-12 col-lg-4">
                  <h2 id="contactUsHeading">Contact Us:</h2>
                </div>
        <div class="col-sm-12 col-lg-4 p-2">
    </div>
    <div class="col-sm-12 col-lg-4">
</div>
    </div>
    <div class= "row">
      <div class="col-sm-12 col-lg-4">
        <h3 id="contactheading2">Address: </h3>
        <p id="contactPara">Somerset West, South Africa</p>
        <h3 id="contactheading2">Phone: </h3>
        <p id="contactPara">Mobile: (+27) 082 222 1313</p>
        <h3 id="contactheading2">Email: </h3>
        <p id="contactPara"> info@playtherapytoysbyldvz.co.za</p>
      </div>
      <div class="col-sm-12 col-lg-4">
        <div class="container-fluid">
        <h3 id="contactheading3"><u>Send us a message</u> </h3>
        <form id="form" method="post" action= "backend/sendmail.php" enctype="multipart/form-data" onsubmit="return contactSubmitHandler()">
    <div style="padding-left: 10%; padding-right: 10%;">
      <div class="form-group">
        <label style="padding-bottom: 1%" class="label" for="inputEmail" >Email:</label>
        <input name="email" type="email" class="form-control" id="inputEmail" placeholder="Enter email address" />
        <div class="invalid-feedback">Please enter an email address.</div>
      </div>
      <div class="form-group">
        <label style="padding-bottom: 1%" class="label" for="inputSubject" >Subject:</label>
        <input name="subject" type="text" class="form-control" id="inputSubject" placeholder="Enter the subject" />
          <div class="invalid-feedback">Please enter a subject header.</div>
      </div>
      <div class="form-group">
            <label  style="padding-bottom: 1%" class="label" for="form_message" >Type your message</label>
            <textarea id="form_message" type="text" name="message" class="form-control" placeholder="Enter message" rows="5" ></textarea>
              <div class="invalid-feedback">Please enter a message.</div>
    </div><br />
              <button name="submit" value="submit" type="submit" class="btn btn-primary " id="signInButton" style=""> &nbspSend&nbsp</button>
              </div>
        </form>
              </div>
  </div>
  <div class="col-sm-12 col-lg-4">
    <img src="images/contact3.jpeg" alt="contact" class="img-fluid">
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
