<?php 
	include("config/connect.php");
	include("config/auto-id.php");

	$menu_id=autoID("menus", "menu_id", "m", 3);
	$menu_name=$_POST['menu_name'];
	$menu_type=$_POST['menu_type'];
    $availability=$_POST['availability'];

	$sql="INSERT INTO menus VALUES ('$menu_id', '$menu_name', '$menu_type' ,'', 'availability')";
	$run=mysqli_query($conn, $sql);
	
	if($run) {
		header("location: admin-index.php");
	}
	// 

?>