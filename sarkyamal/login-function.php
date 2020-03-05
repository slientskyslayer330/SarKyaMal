<?php
   session_start();
   include("config/connect.php");

   if(isset($_POST['login'])) {

      $username=$_POST['username'];
      $password=md5($_POST['password']);
      
      $sql="SELECT * FROM users WHERE user_name='$username' AND password='$password' AND active='1'";
      $select=mysqli_query($conn, $sql); if($select) 

      $count=mysqli_num_rows($select);

      if($count==1) {
         $data=mysqli_fetch_array($select);
         $_SESSION['user_id']=$data['user_id'];

         echo" <script> 
                  alert('You are logged in.'); 
                  window.location.assign('index.php');                  
               </script>";     
      } else {
         echo" <script> 
                  alert('incorrect username or password!'); 
                  window.location.assign('login.php');                  
               </script>"; 
      }
   }
?>