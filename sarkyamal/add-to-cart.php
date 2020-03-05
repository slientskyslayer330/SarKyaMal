<?php 
	session_start();
   $id = $_REQUEST['id'];
   $qty = $_REQUEST['qty'];
   $cart=0;
	$_SESSION['cart'][$id]=$_SESSION['cart'][$id]+$qty;
   header("location: index.php");
     
?>