<?php
	require "PHPMailerAutoload.php";

	function sendMail($from, $to, $subject, $message) {
		$mail = new PHPMailer();
		$mail->isSMTP();                                      // Set mailer to use SMTP
		$mail->Host = 'smtp.gmail.com';  // Specify main and backup SMTP servers
		$mail->SMTPAuth = true;                               // Enable SMTP authentication
		$mail->Username = 'keyboardhit21@gmail.com';                 // SMTP username
		$mail->Password = 'vieuxtemps21';                           // SMTP password
		$mail->SMTPSecure = 'tls';                            // Enable TLS encryption, `ssl` also accepted
		$mail->Port = 587;                                    // TCP port to connect to
		$mail->From = $from;
		$mail->FromName = $from;
		$mail->IsHTML(true);
		$mail->addAddress($to);     // Add a recipient
		$mail->Subject = $subject;
		$mail->Body    = $message;
		$mail->send();
	}
