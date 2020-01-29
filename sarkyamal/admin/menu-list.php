<?php  
	include("config/connect.php");
	$select=mysqli_query($conn, "SELECT * FROM menus");
?>

<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Menu List</title>
</head>
<body>

<table>
	<tr>
		<th>ID</th>
        <th>Menu</th>
        <th>Type</th>
		<th>Photo</th>
        <th>Availability</th>
		<th></th>
		<th></th>
	</tr>
	<?php while ($data=mysqli_fetch_assoc($select)) : ?>
		<tr>
			<td> <?php echo $data['menu_id'];?> </td>
            <td> <?php echo $data['menu_name'];?> </td>
            <td> <?php echo $data['menu_type'];?> </td>
            <td> <?php echo $data['availability'];?> </td>
            <td> <?php echo $data['photo'];?> </td>
			<td> <a href="menu-edit.php?id=<?php echo $data['menu_id']; ?>"> Edit</a></td>
			<td> <a href="menu-del.php?id=<?php echo $data['menu_id']; ?>"> Del</a></td>
		</tr>
	<?php endwhile; ?>
</table>
	
</body>
</html>