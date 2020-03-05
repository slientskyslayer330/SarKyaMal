<?php 
   include('config/connect.php');

   if(isset($_POST['redeem'])) {
      $user_id=$_POST['user_id'];
      $redeem_code=$_POST['redeem_code'];

      $sql="SELECT redeem_code FROM redeem_codes WHERE redeem_code='$redeem_code' AND status='0'";
      $select=mysqli_query($conn, $sql); 
      $count=mysqli_num_rows($select); 

      if ($count!=1) {
         echo "<script> 
                  alert('Please enter valid code.'); 
                  window.location.assign('profile.php');
				   </script>";
      } else {

         $select=mysqli_query($conn, "SELECT balance FROM users WHERE user_id='$user_id'");
         $data=mysqli_fetch_array($select);
         $balance=$data['balance'];
         $balance+=3000;

         $sql="UPDATE users SET balance='$balance' WHERE user_id='$user_id'";
         $balance_update=mysqli_query($conn, $sql);
         
         $sql="UPDATE redeem_codes SET status='1' WHERE redeem_code='$redeem_code'";
         $status_update=mysqli_query($conn, $sql);
   
         if ($balance_update) {

            if ($status_update) {
               echo "<script> 
                        alert('You have successfully redeemed your code.'); 
                        window.location.assign('profile.php');
                     </script>";
            }
         }
      }
   }
?>