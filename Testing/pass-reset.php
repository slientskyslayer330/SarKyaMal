<?php 

	use PHPMailer\PHPMailer\PHPMailer;
	use PHPMailer\PHPMailer\SMTP;
	use PHPMailer\PHPMailer\Exception;
	require("Exception.php");
	require("PHPMailer.php");
	require("SMTP.php");
	require("config/connect.php");
	
	//require 'vendor/autoload.php';
	$mail = new PHPMailer();
	 $mail->SMTPDebug=false;
	//$mail->SMTPDebug = SMTP::DEBUG_SERVER;
	$mail->isSMTP();
	$mail->Host       = 'mail.smtp2go.com';
	$mail->SMTPAuth   =  true;
	$mail->Username   = 'noreply.sarkyamal@gmail.com';
	$mail->Password   = 'M2FzMHZ0MzgzaTMw';
	$mail->SMTPSecure = 'tls';
    $mail->Port       =  "2525";
    

	if(isset($_POST['password']) && !empty($_POST['password'])) 
	{
        $email=$_POST['email'];
		$password=$_POST['password']; 

		if(!preg_match('/^(?=.*\d)(?=.*[A-Za-z])[0-9A-Za-z!@#$%]{6,20}$/', $password))
        {
        	echo "the password does not meet the requirements!";
        }
        else
        { 
			$pass = md5($password);
			$sql="UPDATE users SET password='$password' email='$email'";
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
                       if(!$mail->send())
                       {
                           echo "Something went worng.";
                       }
                       else
                       {
                           echo "An resetted password is sent to your email.";
                       }
                } 

			}
	}
	echo "error";
	
?> 

<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Info</title>
</head>
<body>
	
	
</body>
</html>