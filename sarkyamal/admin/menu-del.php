<?php 
	include("../config/connect.php");

	$id=$_GET['id'];
	$sql = "DELETE FROM menus WHERE menu_id='$id'";
   $delete = mysqli_query($conn, $sql);

	if ($delete) {
      header("location: admin-index.php");
   }
?>