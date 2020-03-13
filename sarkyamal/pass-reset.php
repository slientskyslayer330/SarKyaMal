<?php 

	use PHPMailer\PHPMailer\PHPMailer;
	use PHPMailer\PHPMailer\Exception;
	require $_SERVER['DOCUMENT_ROOT'] . '/mail/Exception.php';
	require $_SERVER['DOCUMENT_ROOT'] . '/mail/PHPMailer.php';
	require $_SERVER['DOCUMENT_ROOT'] . '/mail/SMTP.php';
	require("config/connect.php");
	
	$mail = new PHPMailer;
	$mail->SMTPDebug=false;
	$mail->isSMTP(); 
	$mail->SMTPDebug = 0; 
	$mail->Host = "smtp.gmail.com"; 
	$mail->Port = 587; 
	$mail->SMTPSecure = 'tls'; 
	$mail->SMTPAuth = true;
	$mail->Username = 'noreply.sarkyamal@gmail.com'; 
	$mail->Password = 'thebestytucanteen4ever'; 

	
   $mailsent=0; 

	if(isset($_POST['password']) && !empty($_POST['password'])) 
	{
      $email=$_POST['email'];
		$password=$_POST['password']; 

		if(!preg_match('/^(?=.*\d)(?=.*[A-Za-z])[0-9A-Za-z!@#$%]{6,20}$/', $password))
        {
        	$msg = "the password does not meet the requirements!";
        }
        else
        {  
			$pass = md5($password);
			$sql="UPDATE users SET password='$password' WHERE email='$email'";
			$run=mysqli_query($conn, $sql); 
			if($run) 
				{   
					$mail->setFrom('noreply.sarkyamal@gmail.com', 'Sar Kya Mal');
                	$mail->addAddress($email);
                	$mail->isHTML(true);
                	$mail->Subject = 'Reset | Password';
                	$mail->Body = '<br />
                        Dear Customer,<br/>
                    	
                    	Your password has been successfully changed.<br />
                    	<br />
                    	------------------------<br />
                    	
                    	Password: ' . $password . '<br />
                    	------------------------<br />
                   	 	<br />
                    	<br />
					   '; 
					   $mail->SMTPOptions = array(
						'ssl' => array(
						'verify_peer' => false,
						'verify_peer_name' => false,
						'allow_self_signed' => true
									  )
							   );	 
                       if(!$mail->send())
                       {
                           $msg = "Something went worng.";
                       }
                       else
                       {
									$msg = "An resetted password is sent to your email.";
									$mailsent=1;
                       }
                } 

			}
	}
	else { echo "error!"; }
	
?> 

<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<link rel="icon" href="imgs/favicon.ico" type="image/ico">
	<title>Info</title>
</head>
<body>
<section id="body">
   <?php include('nav.php'); ?>
   
   <div id="page-title">
		<?php if($mailsent===1): ?>
		<h2>Success!</h2>
		<a href="login.php">Login Here.</a> 
		<?php else:?>
		<h2>:(</h2>
		<?php endif; ?>
		<?php echo $msg; ?>
		<a href="index.php">Go back to home.</a>
   </div>
</section>
</body>
</html>