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
    <?php include('nav.php'); ?>

<section id="body">

    <section id="page-title">
        <h2>Sign Up</h2>
    </section>

    <section id="signup-form">
    <form action="user-add.php" method="post">
	   <label>Userame:</label> 
       <input type="text" name="user_name" onfocus="hide(this)" required> 
      
       <label>Email:</label> 
       <input type="email" name="email" onfocus="hide(this)" required> 
      
       <label>Password:</label>  
       <input type="password" name="password" onfocus="show(this)" min="1" max="50" required> 
       <span id="psw">
            Must contain at least 1 number and 1 letter.<br/>
            May contain special characters: !@#$%.<br/>
            Must be 6-20 characters.<br/>
       </span> 

       <input class="focus-button" type="submit" value="Sign Up">
       <small class="pd-left-40">Already have an accoun? <a href="login.php">Login</a> here.</small>
    </form>
    </section>

    
</section>

<script>
    function hide() {
        document.getElementById('psw').style.display ='none';
    }

    function show() {
        document.getElementById('psw').style.display ='inline-block';
    }
</script>
</body>
</html>