<?php
   include("config/connect.php");

   $id=$_GET['id'];

   $sql="SELECT * FROM restaurants WHERE restaurant_id='$id'";
   $result=mysqli_query($conn, $sql);
   $data=mysqli_fetch_assoc($result);
?>

<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Edit Restaurant</title>
</head>
<body>
	<form action="restaurant-update.php" method="POST">
      <input type="hidden" name="restaurant_id" value="<?php echo $data['restaurant_id']; ?>" >
      
      <label>Restaurant Name:</label>
      <input type="text" name="restaurant_name" value="<?php echo $data['restaurant_name']; ?>" required> <br>
      
      <label>Contact Phone:</label>
      <input type="text" name="contact_ph" value="<?php echo $data['contact_ph']; ?>" required> <br>
      
      <label>Location:</label>
      <input type="num" name="location" min="1" max="50" value="<?php echo $data['location']; ?>" required> <br>

		<input type="submit"	value="Update Restaurant">
	</form>
</body>
</html>
