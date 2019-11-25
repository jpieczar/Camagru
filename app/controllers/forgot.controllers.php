<?php
include_once "error.controllers.php";
include_once "email.controllers.php";
include_once "../../config/connection.php";

/*
 * Send them an email telling them that their new pasword is their username.
 * Tell them that they have to change their password as soon as possible.
*/

if (isset($_POST["forgot"]))
{
	

	$to = $email;
	$subject = "NEW PASSWORD";
	$message = "
	<p>Your new password is your username :| .</p>
	<p>Click below to go back to the login page.</p>
	<a href='http://localhost:8080/Camagru/app/views/login.php'>Camagru</a>
	";
	$headers = "forgot@camagru.com";
	mail($to, $subject, $message, $headers);
	header("Location: ../views/login.php");
}
?>