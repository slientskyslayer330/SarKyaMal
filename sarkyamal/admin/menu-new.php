<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>New Menu</title>
</head>
<body>
	<form action="menu-add.php" method="POST">
		<label>Menu Name:</label>
      <input type="text" name="menu_name" required> <br>
      
      <label>Contact Phone:</label>
      <input type="text" name="menu_type" required> <br>
      
      <label>Location:</label>
      <input type="num" name="availability" min="0" max="5" required> <br>

		<input type="submit"	value="Add Menu">
	</form>
</body>
</html>
