<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="icon" href="imgs/favicon.ico" type="image/ico">
    <title>Verified</title>
    
</head>
<body>
<section id="body">x2
   <?php include('nav.php'); ?>
   
    <div id="page-title">
	<h2>Congrats!</h2>
    <?php
        include("config/connect.php");

        if(isset($_GET['email']) && !empty($_GET['email']) AND isset($_GET['hash']) && !empty($_GET['hash'])) {

            $email = $_GET['email']; 
            $hash = $_GET['hash']; 
            $sql="SELECT email, hash, active FROM users WHERE email='".$email."' AND hash='".$hash."' AND active='0'";
            $run=mysqli_query($conn, $sql);

            if($run) {
        
                $sql1="UPDATE users SET active='1' WHERE email='".$email."' AND hash='".$hash."' AND active='0'";
                $run1=mysqli_query($conn, $sql1);           
    ?>

    <p>Your account has been made. You can now <a href="login.php">login</a> here.</p>

    <?php 
            } else {
                    echo '<div class="statusms">The url is either invalid or you already have activated your account.';
            }
        } else {
            echo 'Invalid approach, please use the link that has been send to your email.';
        }
    ?> 
   </div>
</section>
    
</body>
</html>
