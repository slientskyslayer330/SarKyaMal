<?php 
	include("config/connect.php");

	$id    = $_GET['id'];
	$sql   = "DELETE FROM admins WHERE admin_id='$id'";
   $delete = mysqli_query($conn, $sql);

	if ($delete) {
      header("location: admin-index.php");
   }
?>