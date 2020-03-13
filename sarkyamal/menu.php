<?php
   include("config/connect.php");
   if(isset($_REQUEST['mid']))
	{
      $id=$_REQUEST['mid'];

      $select=mysqli_query($conn, "SELECT * FROM menus WHERE menu_id='$id'");
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
         <h2><?php echo $data['menu_name'];?></h2> 
         Type: <?php echo $data['menu_type'];?>
      </div>
     
      <div class="content">
         <hr>
         <h3>Available from</h3>
         <?php 
            $id = $_REQUEST['mid'];
            $sql="SELECT * FROM restaurants, restaurant_menu, menus WHERE menus.menu_id='$id' AND restaurants.restaurant_id=restaurant_menu.restaurant_id AND menus.menu_id=restaurant_menu.menu_id";
      
            $select=mysqli_query($conn, $sql);  
            $count=mysqli_num_rows($select);
            for ($i=0; $i < $count; $i++) :
               $row=mysqli_fetch_array($select);
         ?>
         <ul class="list">
            <li><a href="menu-detail.php?rid=<?php echo $row['restaurant_id'];?>&mid=<?php echo $id;?>""><?php echo $row['restaurant_name'];?></a></li>
         </ul>
         <?php endfor; ?>
      </div>
   </section>
</body>
</html>