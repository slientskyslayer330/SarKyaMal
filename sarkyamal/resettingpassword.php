
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
	$mail->Username = 'enteryourgmailhere'; 
	$mail->Password = 'gmailpassword'; 
    
	$mailsent=0;

if(isset($_POST['email']) && !empty($_POST['email'])) 
{
	$email=$_POST['email'];
	$sql="SELECT * FROM users WHERE email= '$email'";
	$select=mysqli_query($conn, $sql);

	$count=mysqli_num_rows($select);  
	if ($count==1) {
		$hash = md5(rand(0, 1000));
	
		$sql="UPDATE users SET hash='$hash' where email='$email'";
		$run=mysqli_query($conn, $sql); 

		if($run)  {   
			$mail->setFrom('noreply.sarkyamal@gmail.com', 'Sar Kya Mal');
			$mail->addAddress($email);
			$mail->isHTML(true);
			$mail->Subject = 'Reset | Password';
			$mail->Body = '<br />
					Dear User, <br/>
					Recently a request was submitted to reset a password for your account. If this was a mistake, just ignore this email and nothing will happen.<br />
				
					Please click this link to reset your account:<br />
					http://sarkyamal.com/passwordreset.php?email=' . $email . '&hash=' . $hash . '<br />
					<br />
					'; 
			
			if(!$mail->send())
			{
				$msg = "Something went worng.";
			}
			else
			{
				$msg = "An email has been sent to reset your password.";
				$mailsent=1;
			}					
		}
	} else {
		$msg = 'The email is not registered here. Please try with another one.';
	}	
}
	
?> 

<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Info</title>
</head>
<body>
<section id="body">
   <?php include('nav.php'); ?>
   
   <div id="page-title">
		<?php if($mailsent===1): ?>
		<h2>Check your mail!</h2> 
		<?php endif; ?>
		<?php echo $msg; ?>
   </div>
</section>	
</body>
</html>
