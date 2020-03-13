<?php 
	session_start();
   $id = $_REQUEST['id'];
   $qty = $_REQUEST['qty'];
   $menu_id = $_REQUEST['menu_id'];
   $restaurant_id = $_REQUEST['restaurant_id'];
   $cart=0;
	$_SESSION['cart'][$id]=$_SESSION['cart'][$id]+$qty;
   header("location: menu-detail.php?mid=".$menu_id."&rid=".$restaurant_id);
?>