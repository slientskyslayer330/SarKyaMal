<?php 
	include("../config/connect.php");

	$sql= "SELECT * FROM restaurants";
	$result=mysqli_query($conn, $sql); 
	$count=mysqli_num_rows($result);

	$sql1= "SELECT * FROM menus";
	$result1=mysqli_query($conn, $sql1); 
	$count1=mysqli_num_rows($result1);
	
?>

<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>New Restarant Menu</title>
</head>
<body>
	<form action="res-menu-add.php" method="POST"> <br>
	  <label>Restaurant Name:</label>
    <select name="restaurant_id">
	  	<option value="0">---SELECT---</option> 
		<?php 
			for($i=0; $i<$count; $i++) { 
				$restaurants=mysqli_fetch_array($result);
		?>
	  		<option value="<?php echo $restaurants['restaurant_id']; ?>">
			  <?php echo $restaurants['restaurant_name']; ?>
			</option>
			<?php } ?>
	  </select>
	  <br>
				
	  <label>Menu Name:</label>
      <select name="menu_id"> 
	  		<option value="0">---SELECT---</option>
			<?php 
				for($i=0; $i<$count1; $i++) { 
					$menus=mysqli_fetch_array($result1);
			?>
			<option value="<?php echo $menus['menu_id']; ?>">
			<?php echo $menus['menu_name']; ?>
			</option>
			<?php } ?>
	  	</select>
		<br>

	  <label>Price: </label>
	  <input type="number" name="price" required> <br>
	  
	  <label>Description:</label> <br>
	  <textarea name="description" cols="30" rows="5"></textarea> <br>
      
      <input type="submit" value="Add Menu for Restaurant">
	</form>
</body>
</html>
