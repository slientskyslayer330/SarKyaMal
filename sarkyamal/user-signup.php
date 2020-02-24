<?php 
session_start();
?>

<!DOCTYPE html>
<html lang="en">
<head>
   <meta charset="UTF-8">
   <meta name="viewport" content="width=device-width, initial-scale=1.0">
   <meta http-equiv="X-UA-Compatible" content="ie=edge">
   <title>Sign Up</title>
</head>
<body>
    <?php   if(isset($_SESSION['msg'])) echo $_SESSION['msg']; ?>
<form id="signupform" action="user-add.php" method="POST">
	  <label>Name:</label>
      <input type="text" name="user_name" required> <br>
      
      <label>Email:</label>
      <input type="email" name="email" required> <br>
      
      <label>Password:</label>
      <input type="password" name="password" min="1" max="50" required> <br>
        <p>
            May contain letter and numbers.<br/>
            Must contain at least 1 number and 1 letter.<br/>
            May contain any of these characters: !@#$%.<br/>
            Must be 6-20 characters.<br/>
        </p>

		<input type="submit" value="Sign Up">
    </form>
</body>
</html>