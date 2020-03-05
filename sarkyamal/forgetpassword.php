<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
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

    <div id="content">
        <form action="resettingpassword.php" method="post">
            <label></label>
        </form>
        
   </div>
</section>
</body>
</html>



<div class="container">
    <div class="regisFrm">
        <form action="resettingpassword.php" method="post">
            <input type="email" name="email" placeholder="EMAIL" required="">
            <div class="send-button">
                <input type="submit" name="forgotSubmit" value="CONTINUE">
            </div>
        </form>
    </div>
</div>  
</body>
</html>
