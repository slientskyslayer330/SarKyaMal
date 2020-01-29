<?php
   session_start();
   include("admin/config/connect.php");

   if(isset($_POST['login'])) {

      $username=$_POST['username'];
      $password=$_POST['password'];

      $sql="SELECT * FROM users WHERE user_name='$username' AND password='$password'";
      $select=mysqli_query($conn, $sql);

      $count=mysqli_num_rows($select);

      if($count==1) {
         $data=mysqli_fetch_array($select);

         $_SESSION['user_id']=$user_id;
         header("location: index.php");
         
      } else {
         echo" <script> 
                  alert('incorrect username or password!'); 
                  window.location.assign('login.php');
               </script>";
         
      }
   }
?>