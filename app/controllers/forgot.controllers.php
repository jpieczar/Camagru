<?php
include_once "error.controllers.php";
include_once "email.controllers.php";
include_once "../../config/connection.php";

if (isset($_POST["forgot"]))
{
	$user = htmlentities($_POST['username']);
	$rand = bin2hex(random_bytes(5));
	$password = password_hash($rand, PASSWORD_DEFAULT);

	$query = "SELECT `email` FROM `usrtbl` WHERE `username` = :username";
	$stmt = $db->prepare($query);
	$stmt->execute([':username' => $user]);
	$res = $stmt->fetch();

	if ($res["varification"] == 1)
	{
		$sql = "UPDATE `usrtbl` SET `pass` = :pas WHERE `username` = :username;";
		$stmt = $db->prepare($sql);
		$stmt->execute(array(":username" => $user, ":pas" => $password));

		$to = $res['email'];
		$subject = "NEW PASSWORD";
		$message = "
		<p>Your new password is >>>> $rand <<<<.</p>
		<p>Click below to go back to the login page.</p>
		<a href='http://localhost:8080/Camagru/app/views/login.php'>Camagru</a>
		<p>Change your password as soon as possible.</p>
		";
		$headers = "forgot@camagru.com";
		mail($to, $subject, $message, $headers);
		header("Location: ../views/login.php");
	}
	else
	{
		mail($to, $subject, $message, $headers);
		header("Location: ../views/login.php");
	}
}
?>