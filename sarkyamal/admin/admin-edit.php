<?php
   include("../config/connect.php");

   $id=$_GET['id'];

   $sql    ="SELECT * FROM admins WHERE admin_id='$id'";
   $result =mysqli_query($conn, $sql);
   $data   =mysqli_fetch_assoc($result);
?>

<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Edit Admin</title>
</head>
<body>
	<form action="admin-update.php" method="POST">
      <input type="hidden"   name="admin_id"   value="<?php echo $data['admin_id']; ?>" >
      
      <label>Admin Name:</label>
      <input type="text"     name="admin_name" value="<?php echo $data['admin_name']; ?>" required> <br>
      
      <label>Email:</label>
      <input type="text"     name="email"      value="<?php echo $data['email']; ?>" required> <br>
      
      <label>Password:</label>
      <input type="password" name="password"   value="<?php echo $data['password']; ?>" required> <br>

		<input type="submit"	value="Update Admin">
	</form>
</body>
</html>
