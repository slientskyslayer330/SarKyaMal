<?php 
   include("../config/connect.php"); 

   $restaurant_id=$_POST['restaurant_id'];
   $restaurant_name=$_POST['restaurant_name'];
	$contact_ph=$_POST['contact_ph'];
	$location=$_POST['location'];

	$sql="UPDATE restaurants SET restaurant_name='$restaurant_name', contact_ph='$contact_ph', location='$location' 
         WHERE restaurant_id='$restaurant_id'";
	$update=mysqli_query($conn, $sql);
   
   if ($update) {
      header("location: restaurant-list.php");
   }
?>