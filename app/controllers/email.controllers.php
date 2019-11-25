<?php

function sendEmail($email)
{
	$to = $email;
	$subject = "VERIFICATION";
	$message = "
	<p>Click the link below to verify your account.</p>
	<a href='http://localhost:8080/Camagru/app/views/verified.php?email=$email'>Camagru</a>
	";
	$headers = "verify@camagru.com";
	mail($to, $subject, $message, $headers);
	header("Location: ../views/newAccount.php");
}

?>
