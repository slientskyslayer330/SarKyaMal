<?php 
	include("admin/config/connect.php");
	include("admin/config/auto-id.php");

	$user_id=autoID("users", "user_id", "U", 5);
	$user_name=$_POST['user_name'];
	$email=$_POST['email'];
	$password=$_POST['password'];

	$sql="INSERT INTO users VALUES ('$user_id', '$user_name', '$email', '$password', '', '')";
	$run=mysqli_query($conn, $sql);
	
	if($run) {
		header("location: index.php");
	}
 

?>