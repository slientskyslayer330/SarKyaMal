<?php 
	include("config/connect.php");
	include("config/auto-id.php");

	$admin_id  =autoID("admins", "admin_id", "a", 2);
	$admin_name=$_POST['admin_name'];
	$email     =$_POST['email'];
    $password  =$_POST['password'];

	$sql="INSERT INTO admins VALUES ('$admin_id', '$admin_name', '$email' ,'$password' )";
	$run=mysqli_query($conn, $sql);
	
	if($run) {
		header("location: admin-index.php");
	}
?>