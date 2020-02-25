<?php  
	include("../config/connect.php");
	$select=mysqli_query($conn, "SELECT * FROM admins");
?>

<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Admin List</title>
</head>
<body>

<table>
	<tr>
		<th>ID</th>
        <th>Name</th>
        <th>Email</th>
		<th>Password</th>

		<th></th>
		<th></th>
	</tr>
	<?php while ($data=mysqli_fetch_assoc($select)) : ?>
		<tr>
			<td> <?php echo $data['admin_id'];?> </td>
            <td> <?php echo $data['admin_name'];?> </td>
            <td> <?php echo $data['email'];?> </td>
            <td> <?php echo $data['password'];?> </td>

			<td> <a href="admin-edit.php?id=<?php echo $data['admin_id']; ?>"> Edit</a></td>
			<td> <a href="admin-del.php ?id=<?php echo $data['admin_id']; ?>"> Del</a></td>
		</tr>
	<?php endwhile; ?>
</table>
	
</body>
</html>