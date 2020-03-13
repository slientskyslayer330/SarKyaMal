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
   <link rel="icon" href="imgs/favicon.ico" type="image/ico">
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
         Rating: <?php echo $data['rating'];?><br>
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
            <input type="hidden" name="menu_id" value="<?php echo $data['menu_id'];?>">
            <input type="hidden" name="restaurant_id" value="<?php echo $data['restaurant_id'];?>">
            Qty: 
            <input type="number" value="1" name="qty" min="1" id="qty"> 
            <input type="hidden" name="id" value="<?php echo $data['rm_id'];?>">
            <a href="#" class="button-link focus-button" onclick="document.getElementById('order').submit();">Order</a>
         </form>
         
         <hr>

         <?php
            $rm_id=$data['rm_id'];
            $sql="SELECT CAST(AVG(rating) AS DECIMAL(10,1)) AS avgrating, COUNT(*) AS totalreview FROM reviews WHERE rm_id='$rm_id'";
            $select=mysqli_query($conn, $sql);
            $overall=mysqli_fetch_array($select);
         ?>

         <div id="review">
            <div id="row">
               <h5 id="review-title">
                  Reviews &bull; 
                  <small id="overall"><?php echo $overall['avgrating']; ?> out of 5 by <?php echo $overall['totalreview']; ?> people</small>
               </h5>
            </div>
            <form action="review.php" method="post">
               <input type="hidden" name="rm_id" value="<?php echo $data['rm_id'];?>">
               <input type="hidden" name="menu_id" value="<?php echo $data['menu_id'];?>">
               <input type="hidden" name="restaurant_id" value="<?php echo $data['restaurant_id'];?>">
               Rating: 
               <input type="number" name="rating" id="rating" min="1" max="5" step="0.5" required> <br>
               <input type="text" name="review" placeholder="Leave a comment..." id="cmt" required>
               <input type="submit" value="Post" name="post" id="post">
               <br><br>
            </form>
            <?php 
               $sql="SELECT * FROM reviews, users WHERE rm_id='$rm_id' AND reviews.user_id=users.user_id ORDER BY reviews.date DESC";
               $select=mysqli_query($conn, $sql);
               $count=mysqli_num_rows($select);

               if ($count==0) {
                  echo "No reviews yet.";
               }

               for ($i=0; $i < $count; $i++) :
                  $data_review=mysqli_fetch_array($select);               
            ?>

            <div class="row">
               <picture>
                  <img id="profilepic" style=" display: inline-block; width: 27px; border-radius: 100%; margin-right: 10px;" src="<?php echo $data_review['profile'];?>" alt="profile" >
               </picture>
               <div style="width: 70%;">
                  <b style="color: #e3492b;"><?php echo $data_review['user_name'];?></b> &bull;
                  <small><?php echo substr($data_review['date'], 0, 10);?></small>
                  <p>Rating: <?php echo $data_review['rating'];?>/5</p>
               </div>
            </div>
            <div>
               <p style="margin-left: 37px;"><?php echo $data_review['review']; ?></p>
            </div>
            <hr>
            <?php endfor; ?>
         </div>         
      </div>
   </section>
</body>
</html>