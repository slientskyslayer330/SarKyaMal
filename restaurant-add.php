<?php 
	include("config/connect.php");
	include("config/auto-id.php");

	$restaurant_id=autoID("restaurants", "restaurant_id", "R", 2);
	$restaurant_name=$_POST['restaurant_name'];
	$contact_ph=$_POST['contact_ph'];
	$location=$_POST['location'];

	$sql="INSERT INTO restaurants VALUES ('$restaurant_id', '$restaurant_name', '$contact_ph', '$location')";
	$run=mysqli_query($conn, $sql);
	
	if($run) {
		header("location: admin-index.php");
	}
	// 

?>