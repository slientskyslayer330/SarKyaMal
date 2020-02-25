<?php
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

require("Exception.php");
require("PHPMailer.php");
require("SMTP.php");

$mail = new PHPMailer();
$mail->IsSMTP();
$mail->Mailer = "smtp";
$mail->Host = "mail.smtp2go.com";
$mail->Port = "2525"; // 8025, 587 and 25 can also be used. Use Port 465 for SSL.
$mail->SMTPAuth = true;
$mail->SMTPSecure = 'tls';
$mail->Username = "noreply.sarkyamal@gmail.com";
$mail->Password = "M2FzMHZ0MzgzaTMw";

$mail->From = "noreply.sarkyamal@gmail.com";
$mail->FromName = "Sar Kya Mal";
$mail->AddAddress("slientskyslayer330@gmail.com", "Win Maw Oo");

$mail->Subject = "Hi!";
$mail->Body = "Hi! How are you?";
$mail->WordWrap = 50;

if(!$mail->Send()) {
echo 'Message was not sent.';
echo 'Mailer error: ' . $mail->ErrorInfo;
exit;
} else {
echo 'Message has been sent.';
}
?>