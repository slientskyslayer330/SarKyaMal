<!DOCTYPE html>
<html lang="en">
<head>
   <meta charset="UTF-8">
   <meta name="viewport" content="width=device-width, initial-scale=1.0">
   <meta http-equiv="X-UA-Compatible" content="ie=edge">
   
   <title>Order History</title>
   <link rel="icon" href="imgs/favicon.ico" type="image/ico">
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
      <div class="row">
         <div id="profile" class="display-inline-block width50">
            <img id="profilepic" style="display: inline-block; width: 40px; border-radius: 100%; margin-right: 10px;" src="<?php echo $data_user['profile'];?>" alt="profile" >
            <h4 class="display-inline-block">@<?php echo $data_user['user_name'];?></h4> &emsp;
         </div>
         <div class="display-inline-block width50">
            <p style="margin-top: 10px;">Balance: <?php echo $data_user['balance']; ?> Ks</p>
         </div>
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
      <div class="history-box">
         <div class="row">
            <p style="width: 50%;">
               ID: <a href="history-detail.php?orderid=<?php echo $data_order['order_id'];?>"><?php echo $data_order['order_id'];?> </a>
            </p>
            <p style="width: 50%;">Date: <?php echo substr($data_order['date'], 0, 10);?> </p>
         </div>
         <div class="row">
            <p style="width: 50%;">Amouont: <?php echo $data_order['total'];?> Ks</p>
            <p style="width: 50%;">Status: <?php echo $data_order['status'];?> </p>
         </div>
      </div>
      <?php endfor; ?>
   </div> 

</section>
  
</body>
</html>
