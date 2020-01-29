<?php 
   include("config/connect.php"); 

    $menu_id=$_POST['menu_id'];
    $menu_name=$_POST['menu_name'];
	$menu_type=$_POST['menu_type'];
	$availability=$_POST['availability'];

	$sql="UPDATE menus SET menu_name='$menu_name', menu_type='$menu_type', availability='$availability' 
         WHERE menu_id='$menu_id'";
	$update=mysqli_query($conn, $sql);
   
   if ($update) {
      header("location: menu-list.php");
   }
?>