<?php 
	include("../config/connect.php");

	$id=$_GET['id'];
	$sql = "DELETE FROM restaurants WHERE restaurant_id='$id'";
   $delete = mysqli_query($conn, $sql);

	if ($delete) {
      header("location: admin-index.php");
   }
?>