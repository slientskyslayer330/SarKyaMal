<!DOCTYPE html>
<html lang="en">
<head>
   <meta charset="UTF-8">
   <meta name="viewport" content="width=device-width, initial-scale=1.0">
   <meta http-equiv="X-UA-Compatible" content="ie=edge">
   
   <title>Order History</title>
</head>
<body>
   <?php 
      include('nav.php'); 
      include('cart.php');
      
      include('config/connect.php');

      if(!isset($_SESSION['user_id'])) 
      {
         header('location: index.php');
         exit();	
      } else {
         $user_id=$_SESSION['user_id'];
         $sql="SELECT * FROM users WHERE user_id='$user_id'";
         $select_user=mysqli_query($conn, $sql);  
         $data_user=mysqli_fetch_array($select_user); 
      }
   ?>  

<section id="body"> 
   <div id="page-title">
      <div id="profile" class="display-inline-block width70">
         <img id="profilepic" style="display: inline-block; width: 40px; border-radius: 100%; margin-right: 10px;" src="profiles/default-profile.jpg" alt="profile" >
         <h4 class="display-inline-block">@<?php echo $data_user['user_name'];?></h4>
      </div>
   </div>

   <div class="content">
      <?php 
         $sql="SELECT * FROM orders WHERE user_id='$user_id'";
         $select_order=mysqli_query($conn, $sql);
         $count=mysqli_num_rows($select_order);

         for ($i=0; $i < $count; $i++) : 
            $data_order=mysqli_fetch_array($select_order);
      ?>
      <div>
         <div class="row">
            <p style="width: 50%;"><a href="#"><?php echo $data_order['order_id'];?> </a></p>
            <p style="width: 50%;"><?php echo substr($data_order['date'], 0, 10);?> </p>
         </div>
         <div class="row">
            <p style="width: 50%;">Amouont: <?php echo $data_order['total'];?> Ks</p>
            <p style="width: 50%;"><?php echo $data_order['status'];?> </p>
         </div>
         <hr>
      </div>
      <?php endfor; ?>
   </div> 

</section>
  
</body>
</html>
