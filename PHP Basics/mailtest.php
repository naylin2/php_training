<?php

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;
require 'vendor/autoload.php';

$mail = new PHPMailer(true);
try {
	$mail->SMTPDebug = 2;
	$mail->isSMTP();
	$mail->Host = 'smtp.gmail.com';
	$mail->SMTPAuth = true;
	$mail->Username = 'test@gmail.com';
	$mail->Password = 'notgontellyoulol';
	$mail->SMTPSecure = 'tls';
	$mail->Port = 587;

	$mail->setFrom('test@gmail.com', 'Nay Lin Htoo');
	$mail->addAddress('nayylinhtoo@gmail.com');
	$mail->addReplyTo('nayylinhtoo@gmail.com');

	$mail->isHTML(true);
	$mail->Subject = 'Test2';
	$mail->Body = '<b>Body<b>';

	$mail-> send();
	echo "Message has been sent";
}catch(Exception $e){
	echo "not sent. Error: ", $mail->ErrorInfo;
}

?>