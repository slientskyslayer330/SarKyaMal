<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>New Admin</title>
</head>
<body>
	<form action="admin-add.php" method="POST">
		<label>Admin Name:</label>
      <input type="text" name="admin_name" required> <br>
      
      <label>Email:</label>
      <input type="text" name="email" required> <br>
      
      <label>password:</label>
      <input type="password" name="password"  required> <br>

		<input type="submit"	value="Add Admin">
	</form>
</body>
</html>
