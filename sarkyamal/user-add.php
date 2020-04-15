<?php 

	use PHPMailer\PHPMailer\PHPMailer;
	use PHPMailer\PHPMailer\Exception;
	require $_SERVER['DOCUMENT_ROOT'] . '/mail/Exception.php';
	require $_SERVER['DOCUMENT_ROOT'] . '/mail/PHPMailer.php';
	require $_SERVER['DOCUMENT_ROOT'] . '/mail/SMTP.php';
	require("config/connect.php");
	include("config/auto-id.php");
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
	
	$mailsent = 0;
    

	if(isset($_POST['user_name']) && !empty($_POST['user_name']) AND isset($_POST['email']) && !empty($_POST['email']) AND isset($_POST['password']) && !empty($_POST['password'])) {
        
		$user_id=autoID("users", "user_id", "U", 5);
		$user_name=$_POST['user_name'];
		$email=$_POST['email'];
		$password=$_POST['password']; 
		$profile=$_POST['profile'];

		if (!preg_match("/^[_a-z0-9-]+(\.[_a-z0-9-]+)*@[a-z0-9-]+(\.[a-z0-9-]+)*(\.[a-z]{2,3})$/i", $email)){
        $msg = "The email you have entered is invalid, please try again.";//-------------------------------------------msg1
    	} else { 
        	if(!preg_match('/^(?=.*\d)(?=.*[A-Za-z])[0-9A-Za-z!@#$%]{6,20}$/', $password)) {
            $msg = 'The password does not meet the requirements!';//---------------------------------------------------msg2
        	} else { 
				$sql = " SELECT * FROM users WHERE user_name='$user_name' OR email='$email'";

            $check= mysqli_query ($conn, $sql);
            $count= mysqli_num_rows($check);

            if ($count<>0) {
					$msg = 'Username or email already exist!<a href="signup.php"> sign up</a> again.';//------------------------------------------------------------msg3
				} else {
					$hash = md5(rand(0, 1000));
					$pass = md5($password);

					$sql="INSERT INTO users VALUES ('$user_id', '$user_name', '$email', '$pass', '$profile', '0', '$hash', '0')";
					$run=mysqli_query($conn, $sql); 

					if($run) {   
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
                    	http://www.sarkyamal.com/verify.php?email=' . $email . '&hash=' . $hash . '<br />
                    	<br />
							 ';
							 $mail->SMTPOptions = array(
								'ssl' => array(
								'verify_peer' => false,
								'verify_peer_name' => false,
								'allow_self_signed' => true
											  )
									   );	 	 
							 
						if(!$mail->send()){
							$msg = "Something went wrong. Please try again.";
						} else {
							$msg = "Your account has been made, <br /> please verify it by clicking the activation link that has been sent to your email.";
							
							$mailsent=1;
						}//--------------------------------------mail sent
					}//----------------------------------data inserted    	
				}//------------------------------unique username & email
			}//----------------------------password meet requirements
		}//---------------------------valid email format
	}//------------------------post values not null
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
		<h2>Welcome!</h2> 
		<?php endif; ?>
		<?php echo $msg; ?>
   </div>
</section>
   
</body>
</html>