<?php 
   include("../config/connect.php"); 

    $admin_id  =$_POST['admin_id'];
    $admin_name=$_POST['admin_name'];
	$email     =$_POST['email'];
	$password  =$_POST['password'];

	$sql="UPDATE admins SET admin_name='$admin_name', email='$email', password='$password' 
          WHERE admin_id='$admin_id'";
	$update=mysqli_query($conn, $sql);
   
   if ($update) {
      header("location: admin-list.php");
   }
?>