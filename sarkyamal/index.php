<?php
   include('config/connect.php');
?>

<!DOCTYPE html>
<html lang="en">
<head>
   <meta charset="UTF-8">
   <meta name="viewport" content="width=device-width, initial-scale=1.0">
   <meta http-equiv="X-UA-Compatible" content="ie=edge">
   <link rel="icon" href="imgs/favicon.ico" type="image/ico">
   <style>
      
   </style>

   <title>Home</title>
</head>
<body>
<section id="body">
   <?php 
      include('nav.php'); 
      include('cart.php');
   ?>
   
   <div id="page-title">
      <h4>Most rated items</h4>
   </div>
    
   <div class="content">
      <?php 
         $sql="SELECT * FROM restaurants, restaurant_menu, menus WHERE restaurants.restaurant_id=restaurant_menu.restaurant_id AND menus.menu_id=restaurant_menu.menu_id ORDER BY restaurant_menu.rating DESC LIMIT 3";
         $select=mysqli_query($conn, $sql);

         for ($i=0; $i < 3; $i++) :
            $data=mysqli_fetch_array($select);
            $rm_id=$data['rm_id'];
            $select_review=mysqli_query($conn, "SELECT * FROM reviews WHERE rm_id='$rm_id'");
            $reviewcount=mysqli_num_rows($select_review);
            
      ?>
      
      <div class="home-menu">
         <div class="row">
            <div class="width70">
               <p><b><?php echo $data['menu_name'] ?></b> from <b><?php echo $data['restaurant_name'] ?></b> </p>
            </div>
            <div class="width30">
               <b><?php echo $data['price'] ?></b> Ks
            </div>
            <div>
               rating: <?php echo $data['rating']; ?>&emsp; | &emsp;<?php echo $reviewcount; ?> reviews
            </div>
         </div>
     </div>  
      <?php endfor; ?>
   </div>
   <br>
   <div id="page-title">
      <h4>Most ordered items</h4>
   </div>

   <div class="content">
      <?php 

         $sql="SELECT rm_id, COUNT(rm_id) AS moi FROM order_detail GROUP BY rm_id ORDER BY COUNT(rm_id) DESC LIMIT 3";
         $select=mysqli_query($conn, $sql);

         for ($i=0; $i < 3; $i++) :
            $data=mysqli_fetch_array($select);
            $rm_id=$data['rm_id'];
            $moi=$data['moi'];
            $sql1="SELECT * FROM restaurants, restaurant_menu, menus WHERE restaurants.restaurant_id=restaurant_menu.restaurant_id AND menus.menu_id=restaurant_menu.menu_id AND restaurant_menu.rm_id='$rm_id'";
            $select_moi=mysqli_query($conn, $sql1);
            $data_moi=mysqli_fetch_array($select_moi);
      ?>
      
      <div class="home-menu">
         <div class="row">
            <div class="width70">
               <b><?php echo $data_moi['menu_name'] ?></b> from <b><?php echo $data_moi['restaurant_name'] ?></b> 
            </div>
            <div class="width30">
               <b><?php echo $data_moi['price'] ?></b> Ks
            </div>
         </div>
     </div>  
      <?php endfor; ?>
   </div>
</section>

</body>
</html>