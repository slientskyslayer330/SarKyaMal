<!DOCTYPE html>

<html>
<head>
<meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Sar Kya Mal > Verification</title>
    
</head>
<body>
    <?php
        include("config/connect.php");

        if(isset($_GET['email']) && !empty($_GET['email']) AND isset($_GET['hash']) && !empty($_GET['hash']))
        {
   
            $email = $_GET['email']; 
            $hash = $_GET['hash']; 
        }
    ?>  

    <form action="pass-reset.php" method="post">
	    
        <input type="hidden" name="email" value="<?php echo $email; ?>"> 
         
        
      
       <label>Password:</label>  
       <input type="password" name="password" required> 
        <p>
            May contain letter and numbers.<br/>
            Must contain at least 1 number and 1 letter.<br/>
            May contain any of these characters: !@#$%.<br/>
            Must be 6-20 characters.<br/>
       </p> 

       <input class="focus-button" type="submit" value="Reset!">
       
    </form>
</body>
</html>