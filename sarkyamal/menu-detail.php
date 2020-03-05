<?php
   include("config/connect.php");
   if(isset($_REQUEST['mid']))
	{
      $menu_id=$_REQUEST['mid'];
      $restaurant_id=$_REQUEST['rid'];

      $sql="SELECT * FROM restaurants, restaurant_menu, menus WHERE restaurants.restaurant_id='$restaurant_id' AND menus.menu_id='$menu_id' AND restaurants.restaurant_id=restaurant_menu.restaurant_id AND menus.menu_id=restaurant_menu.menu_id";
      $select=mysqli_query($conn, $sql); 
      $data=mysqli_fetch_array($select);
   }
?>


<!DOCTYPE html>
<html lang="en">
<head>
   <meta charset="UTF-8">
   <meta name="viewport" content="width=device-width, initial-scale=1.0">
   <title><?php echo $data['menu_name'];?></title>
</head>
<body>
   
<section id="body"> 
   <?php 
      include('nav.php'); 
      include('cart.php');
   ?>

      <div id="page-title">
         <h2 class="display-inline-block width70"><?php echo $data['menu_name'];?></h2> 
         Rating: <?php echo $data['rating'];?> <br>
         Type: <?php echo $data['menu_type'];?>
      </div>

      <div class="content">

         <p class="display-inline-block width50 left">
         Restaurant: <?php echo $data['restaurant_name'];?>
         </p>
         <p class="display-inline-block width50 right">
         Contact: <?php echo $data['contact_ph'];?>
         </p>
         <div class="endfloat"><hr></div>

         <?php if ($data['description']!="") : ?>
         <p>Available with:&emsp;<?php echo $data['description'];?></p>
         <?php endif; ?>
         <p>Price:&emsp;<b><?php echo $data['price'];?> Ks</b> </p>

         <form action="add-to-cart.php" method="get" id="order">
            Qty: 
            <input type="number" value="1" name="qty" min="1" id="qty"> 
            <input type="hidden" name="id" value="<?php echo $data['rm_id'];?>">
            <a href="#" class="button-link focus-button" onclick="document.getElementById('order').submit();">Order</a>
         </form>
         
         <hr>

         <div id="review">
            <h5>Reviews</h5>
            <form action="#" method+="post">
               <input type="text" placeholder="Leave a comment..." id="cmt">
               <input type="submit" value="Post" name="post" id="post">
            </form>
         </div>     
         
      </div>
   </section>


</body>
</html>