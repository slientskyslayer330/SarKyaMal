<?php session_start(); ?>

<!DOCTYPE html>
<html lang="en">
<head>
   <meta charset="UTF-8">
   <meta name="viewport" content="width=device-width, initial-scale=1.0">
   
   <link rel="stylesheet" href="config/bootstrap.min.css">
   <link rel="stylesheet" href="config/style.css">
   <link rel="stylesheet" href="fonts/BillionaireMediumGrunge.otf">
</head>
<body>
   <section id="topbar">
      <div class="row">
         <div id="logo">
            <div id="logo-img"><img src="imgs/logo.png" alt="logo.png"></div>
            <div id="logo-word"><h1>SarKyaMal</h1></div>
         </div>

         <div id="toggle">
            <div class="line1"></div>
            <div class="line2"></div>
            <div class="line3"></div>
         </div>

         <nav id="nav">
            <a href="index.php" id="first-nav">Home</a>
            <a href="restaurants.php">Restuarants</a>
            <a href="menus.php">Menus</a>
            <a href="#">Location Guide</a>
            <a href="aboutus.php">About Us</a>
            <?php if(isset($_SESSION['user_id'])){ ?>
               <a href="profile.php">Profile</a>
               <a href="order-history.php">Order History</a>
            <?php } ?>
            <div id="bottom-nav">
            <?php if(!isset($_SESSION['user_id'])){ ?>
               <a href="login.php" class="button-link">Login</a>
               <a href="signup.php" class="button-link focus-button">Sign up</a>
            <?php } else { ?>
               <a href="logout.php" class="button-link focus-button">Log out</a>
            <?php } ?>
            </div>
         </nav>
      </div>

      <div id="white-space"></div>
   </section>

   <script src="config/animate.js"></script>
</body>
</html>