<!DOCTYPE html>
<html lang="en">
<head>
   <meta charset="UTF-8">
   <meta name="viewport" content="width=device-width, initial-scale=1.0">
   <meta http-equiv="X-UA-Compatible" content="ie=edge">
   <title>Login</title>
</head>
<body>
   <?php include('nav.php'); ?>

   

   <section id="body"> 
      <section id="page-title">
         <h2>Login</h2>
      </section>

      <section id="login-form">
         <form action="session-start.php" method="POST">

         <label>Username:</label>
         <input type="text" name="username" required>

         <label>Password:<small class="right"><a href="#">Forget Password?</a></small></label>
         <input type="password" name="password" required>

         <input class="focus-button" type="submit" value="Log in" name="login">
         <small>Don't have an account? <a href="sign.up">Create an account</a> here.</small>
         </form>
      </section>
   </section>
  
</body>
</html>
