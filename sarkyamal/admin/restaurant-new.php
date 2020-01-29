<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>New Restaurant</title>
</head>
<body>
	<form action="restaurant-add.php" method="POST">
		<label>Restaurant Name:</label>
      <input type="text" name="restaurant_name" required> <br>
      
      <label>Contact Phone:</label>
      <input type="text" name="contact_ph" required> <br>
      
      <label>Location:</label>
      <input type="num" name="location" min="1" max="50" required> <br>

		<input type="submit"	value="Add Restaurant">
	</form>
</body>
</html>
