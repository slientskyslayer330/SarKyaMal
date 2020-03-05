<?php 
	include("config/connect.php");
	include("config/authenticate.php");

	if(isset($_POST['order'])) {

	}

   if(isset($_POST['room'])) {
      $room=$_POST['room'];
	}
	
	$order_id=$_POST['order_id'];
	$user_id=$_SESSION['user_id'];
	$total=$_POST['total'];
	$status="pending";

	$sql="SELECT balance FROM users WHERE user_id='$user_id'";
	$select=mysqli_query($conn, $sql);
	$data=mysqli_fetch_array($select);
	$balance=$data['balance'];
	
	if($balance<$total) {
		
		echo "<script> 
					alert('Sorry, You do not have enough balance.'); 
					window.location.assign('profile.php');
				</script>";
	} else {
		$new_balance=$balance-$total;

		$sql="UPDATE users SET balance='$new_balance' WHERE user_id='$user_id'";
		$balance_update=mysqli_query($conn, $sql);
		
		$sql="INSERT INTO orders (order_id, user_id, total, status) VALUES ('$order_id', '$user_id', '$total', '$status')";
		$insert_order=mysqli_query($conn, $sql);
		
		foreach ($_SESSION['cart'] as $rm_id => $qty) {
			$sql="INSERT INTO order_detail VALUES ('$order_id', '$rm_id', '$qty')";
			$insert_detail=mysqli_query ($conn, $sql);
		}

		if($balance_update && $insert_order && $insert_order) {
			unset($_SESSION['cart']);
			echo "<script> 
						alert('Thank you for your order.'); 
						window.location.assign('order-history.php');
					</script>";
		}
	}

?>