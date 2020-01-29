<?php  
	include("admin/config/connect.php");
	$select=mysqli_query($conn, "SELECT * FROM users WHERE user_id='' ");
?>

<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Profile</title>
</head>
<body>

<table>
	<tr>
		<th>ID</th>
      <th>Name</th>
      <th>Phone</th>
		<th>Location</th>
		<th></th>
		<th></th>
	</tr>
	<?php while ($data=mysqli_fetch_assoc($select)) : ?>
		<tr>
			<td> <?php echo $data['restaurant_id'];?> </td>
         <td> <?php echo $data['restaurant_name'];?> </td>
         <td> <?php echo $data['contact_ph'];?> </td>
         <td> <?php echo $data['location'];?> </td>
			<td> <a href="restaurant-edit.php?id=<?php echo $data['restaurant_id']; ?>"> Edit</a></td>
			<td> <a href="restaurant-del.php?id=<?php echo $data['restaurant_id']; ?>"> Del</a></td>
		</tr>
	<?php endwhile; ?>
</table>
	
</body>
</html>