<?php 
   include('config/connect.php');
   include('config/authenticate.php');
   include('config/auto-id.php');

   if(isset($_POST['post'])) {
      $review_id=autoid("reviews", "review_id", "C", 6);
      $user_id=$_SESSION['user_id'];
      $rm_id=$_POST['rm_id'];
      $review=$_POST['review'];
      $rating=$_POST['rating'];

      $menu_id=$_POST['menu_id'];
      $restaurant_id=$_POST['restaurant_id'];

      $sql="INSERT INTO reviews (review_id, user_id, rm_id, review, rating) VALUES ('$review_id', '$user_id', '$rm_id', '$review', '$rating')";
      $insert = mysqli_query($conn, $sql);
      
      if ($insert) {
         $sql="SELECT CAST(AVG(rating) AS DECIMAL(10,1)) AS avgrating FROM reviews WHERE rm_id='$rm_id'";
         $select=mysqli_query($conn, $sql);
         $data=mysqli_fetch_array($select);
         $avgrating=$data['avgrating'];
   
         $sql="UPDATE restaurant_menu SET rating='$avgrating' WHERE rm_id='$rm_id'";
         $update=mysqli_query($conn, $sql);
         if ($update) {
            echo "<script>
                  alert('Thank you for your review.');
                  window.location.assign('menu-detail.php?mid=".$menu_id."&rid=".$restaurant_id."');
               </script>";
         }
      } 
      
      

   }
?>