<!DOCTYPE html>
<html lang="en">
<head>
   <meta charset="UTF-8">
   <meta name="viewport" content="width=device-width, initial-scale=1.0">
   <meta http-equiv="X-UA-Compatible" content="ie=edge">
   <title>Log In</title>
</head>
<body>
   <form action="session-start.php" method="POST">
   
   <label>Username:</label>
   <input type="text" name="username" required>

   <label>Password:</label>
   <input type="password" name="password" required>

   <input type="submit" value="Log in" name="login">
   </form>
</body>
</html>
