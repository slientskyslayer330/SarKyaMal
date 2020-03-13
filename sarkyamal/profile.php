<!DOCTYPE html>
<html lang="en">
<head>
   <meta charset="UTF-8">
   <meta name="viewport" content="width=device-width, initial-scale=1.0">
   <meta http-equiv="X-UA-Compatible" content="ie=edge">
   <link rel="icon" href="imgs/favicon.ico" type="image/ico">
   <title>Profile</title>
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
         $select=mysqli_query($conn, $sql);  
         $data=mysqli_fetch_array($select); 
      }
   ?>  

<section id="body"> 
   <div id="page-title">
      <div id="profile" class="display-inline-block width70">
         <img id="profilepic" style="display: inline-block; width: 40px; border-radius: 100%; margin-right: 10px;" src="<?php echo $data['profile'];?>" alt="profile" >
         <h4 class="display-inline-block">@<?php echo $data['user_name'];?></h4>
      </div>
   </div>

   <div class="content">
      <p>email:&emsp; <?php echo $data['email']; ?> </p>
      <hr>

      <h2 id="wallet">My Wallet</h2>
      Balance:&emsp; <b><?php echo $data['balance']; ?> Ks</b> <br> <br>

      <form action="redeem.php" method="post">
         <input type="hidden" name="user_id" value="<?php echo $data['user_id']; ?>">
         Enter your code here and redeem.
         <input style="margin-top: 10px" type="text" name="redeem_code" id="redeem_code" required>
         <input style="margin-top: 10px" type="submit" value="Redeem" name="redeem" class="small-button focus-button">
      </form>
      <hr>

      
   </div> 

</section>
  
</body>
</html>
