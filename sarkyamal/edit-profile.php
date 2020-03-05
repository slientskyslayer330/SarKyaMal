<!DOCTYPE html>
<html lang="en">
<head>
   <meta charset="UTF-8">
   <meta name="viewport" content="width=device-width, initial-scale=1.0">
   <meta http-equiv="X-UA-Compatible" content="ie=edge">

   <title>Profile</title>
</head>
<body>
   <?php 
      include('nav.php'); 
      
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
         <img id="profilepic" style="display: inline-block; width: 40px; border-radius: 100%; margin-right: 10px;" src="profiles/default-profile.jpg" alt="profile" >
         <h4 class="display-inline-block">@<?php echo $data['user_name'];?></h4>
      </div>
   </div>

   <div class="content">
      <form action="update-profile.php"></form>
      
   </div> 

</section>
  
</body>
</html>
