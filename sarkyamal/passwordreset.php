<!DOCTYPE html>

<html>
<head>
<meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="icon" href="imgs/favicon.ico" type="image/ico">
    <title>Sar Kya Mal > Verification</title>
    
</head>
<body>
    <?php
        include("config/connect.php");
        include("nav.php");

        if(isset($_GET['email']) && !empty($_GET['email']) AND isset($_GET['hash']) && !empty($_GET['hash']))
        {
   
            $email = $_GET['email']; 
            $hash = $_GET['hash']; 
        }
    ?>  
<section id="body">
    <div id="page-title">
      <h2>Reset your password</h2>
    </div>

    <div class="content">
    <form action="pass-reset.php" method="post">    
        <input type="hidden" name="email" value="<?php echo $email; ?>">  
        <label>Password:</label>  
        <input type="password" name="password" onfocus="show(this)" required> 
        <span id="psw">
            Must contain at least 1 number and 1 letter.<br/>
            May contain special characters: !@#$%.<br/>
            Must be 6-20 characters.<br/>
        </span>  
        <input class="focus-button" type="submit" value="Reset!"> 
    </form>
    </div>
</section>

<script>
    function show() {
        document.getElementById('psw').style.display ='inline-block';
    }
</script>
</body>
</html>