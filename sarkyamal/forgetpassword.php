<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="icon" href="imgs/favicon.ico" type="image/ico">
    <style>
        #continue {
            margin-top: 10px;
        }
    </style>

    <title>Forget Password?</title>
</head>
<body>
<section id="body">
    <?php 
      include('nav.php'); 
    ?>
   
    <div id="page-title">
      <h2>Forget Password?</h2>
    </div>

    <div class="content">
        <form action="resettingpassword.php" method="post">
            <p>Enter the Email of Your Account to Reset New Password.</p>
            <input type="email" name="email" placeholder="EMAIL" required="">
            <input class="focus-button" id="continue" type="submit" name="forgotSubmit" value="Continue">
        </form>       
   </div>
</section>
</body>
</html>
