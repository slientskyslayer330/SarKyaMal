<?php 
	include("../config/connect.php");
	include("../config/auto-id.php");

	$rm_id=autoID("restaurant_menu", "rm_id", "P", 4);
	$restaurant_id=$_POST['restaurant_id'];
	$menu_id=$_POST['menu_id'];
   $price=$_POST['price'];
   $rating=0;

	echo $sql="INSERT INTO restaurant_menu VALUES ('$rm_id', '$restaurant_id', '$menu_id', '$price', '$rating')";
	$run=mysqli_query($conn, $sql);
	
	if($run) {
		header("location: admin-index.php");
	} else {
      echo "error";
   } 

?>