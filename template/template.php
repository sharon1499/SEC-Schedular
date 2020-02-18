<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <!--Bootstrap Script=-->
     <!-- Bootstrap CSS -->
     <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" ></script>

    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" ></script>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"></script>
  

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" >
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
    <link href="/template/style.css" rel="stylesheet" type="text/css" />
    <title><?php site_name(); ?></title>
  </head>
  <nav class="navbar navbar-expand-lg navbar-light bg-navbar-color fixed-top">
  <a class="navbar-brand" href="#" ><img src="calendarv2.svg" height="70" width="70"/></a>
  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
  </button>
  <div class="collapse navbar-collapse justify-content-center" id="navbarNav">
    <ul class="navbar-nav nav-text-size">
      <?php  nav_menu(); ?>
    </ul>
  </div>
</nav>
<body>
<?php page_content();?>
    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
   <footer> 
   <div class="container navbar-fixed-bottom">
   <div class="row">
     <div class="col-md-3 mt-3">
       <span class="contact-info-header-text"><strong>Contact info:</strong></span>
       <p><a href="https://www.google.com/maps/place/Columbus+State+University/@32.5026472,-84.9426193,17z/data=!3m1!4b1!4m5!3m4!1s0x888ccd9630ce75eb:0xa33e54a5ab3b2796!8m2!3d32.5026472!4d-84.9404306" target="_blank">
       4225 University Ave<br>
       Columbus, GA 31907</a><br>
       <a href="tel:7065078203">(706)507-8203</a>
        </p>
    </div>
    </div>

    </footer>
  </body>
</html>