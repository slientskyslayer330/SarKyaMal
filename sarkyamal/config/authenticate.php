<?php
	session_start();
	if(!isset($_SESSION['user_id'])) 
	{
		echo "<script> 
					alert('Please login first to perform this action.'); 
					window.location.assign('login.php');
				</script>";
		exit();
	} 
?> 