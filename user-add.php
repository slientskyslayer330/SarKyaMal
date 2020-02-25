<?php 
	session_start();

	use PHPMailer\PHPMailer\PHPMailer;
	use PHPMailer\PHPMailer\SMTP;
	
	include("admin/config/connect.php");
	include("admin/config/auto-id.php");
	require 'vendor/autoload.php';
	$mail = new PHPMailer();
	// $mail->SMTPDebug=false;
	$mail->SMTPDebug = SMTP::DEBUG_CONNECTION;
	$mail->isSMTP();
	$mail->Host       = 'mail.smtp2go.com';
	$mail->SMTPAuth   = true;
	$mail->Username   = 'noreply.sarkyamal@gmail.com';
	$mail->Password   = 'M2FzMHZ0MzgzaTMw';
	$mail->SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS;
	$mail->Port       =  "2525";
	if(isset($_POST['user_name']) && !empty($_POST['user_name']) AND isset($_POST['email']) && !empty($_POST['email']) AND isset($_POST['password']) && !empty($_POST['password'])) 
	{
		$user_id=autoID("users", "user_id", "U", 5);
		$user_name=$_POST['user_name'];
		$email=$_POST['email'];
		$password=$_POST['password'];

		if (!preg_match("/^[_a-z0-9-]+(\.[_a-z0-9-]+)*@[a-z0-9-]+(\.[a-z0-9-]+)*(\.[a-z]{2,3})$/i", $email))
		{
    	
        $msg = "The email you have entered is invalid, please try again.";
    	}
    	else
    	{
        	if(!preg_match('/^(?=.*\d)(?=.*[A-Za-z])[0-9A-Za-z!@#$%]{6,20}$/', $password))
        	{
            	$msg = 'the password does not meet the requirements!';
        	}
        	else
        	{

        		$hash = md5(rand(0, 1000));
        		$pass = md5($password);

				$sql="INSERT INTO users VALUES ('$user_id', '$user_name', '$email', '$pass', '', '', '$hash', '0')";
				$run=mysqli_query($conn, $sql);
	
				if($run) 
				{
					$mail->setFrom('noreply.sarkyamal@gmail.com', 'Sar Kya Mal');
                	$mail->addAddress($email);
                	$mail->isHTML(true);
                	$mail->Subject = 'Signup | Verification';
                	$mail->Body = '<br />

                    	Thanks for signing up!<br />
                    	Your account has been created, you can login with the following credentials after you have activated your account by pressing the url below.<br />
                    	<br />
                    	------------------------<br />
                    	Username: ' . $user_name . '<br />
                    	Password: ' . $password . '<br />
                    	------------------------<br />
                   	 	<br />
                    	Please click this link to activate your account:<br />
                    	localhost/sarkyamal/verify.php?email=' . $email . '&hash=' . $hash . '<br />
                    	<br />
               	    '; 
                	$mail->send();
					
						 $msg = "Your account has been made, <br /> please verify it by clicking the activation link that has been send to your email.";	

				}

			}
		}
	}
	$_SESSION['msg']=$msg;
?> 