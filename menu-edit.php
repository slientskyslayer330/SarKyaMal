<?php
   include("config/connect.php");

   $id=$_GET['id'];

   $sql="SELECT * FROM menus WHERE menu_id='$id'";
   $result=mysqli_query($conn, $sql);
   $data=mysqli_fetch_assoc($result);
?>

<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Edit Menu</title>
</head>
<body>
	<form action="menu-update.php" method="POST">
      <input type="hidden" name="menu_id" value="<?php echo $data['menu_id']; ?>" >
      
      <label>Menu Name:</label>
      <input type="text" name="menu_name" value="<?php echo $data['menu_name']; ?>" required> <br>
      
      <label>Menu Type:</label>
      <input type="text" name="menu_type" value="<?php echo $data['menu_type']; ?>" required> <br>
      
      <label>Availability:</label>
      <input type="num" name="availability" min="0" max="5" value="<?php echo $data['availability']; ?>" required> <br>

		<input type="submit"	value="Update Menu">
	</form>
</body>
</html>
