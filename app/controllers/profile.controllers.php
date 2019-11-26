<?php

include_once "../../config/database.php";
include "error.controllers.php";
include_once "session.controllers.php";
include_once "../../config/connection.php";

/* 
 * Here will sit the change (update database) functions.
 * Send an email notifying about the update.
 */

if (isset($_POST["cPassword"]))
{
	$user = $_SESSION['username'];
	userin($_POST["bpassword"], $user);
	$password = password_hash(htmlentities($_POST["bpassword"]), PASSWORD_DEFAULT);

	$sql = "UPDATE `usrtbl` SET `pass` = :pass WHERE `username` = :username;";

	$stmt = $db->prepare($sql);
	$stmt->execute(array(":username" => $user, ":pass" => $password));

	$query = "SELECT `email` FROM `usrtbl` WHERE `username` = :username";
	$stmt = $db->prepare($query);
	$stmt->execute([':username' => $user]);
	$res = $stmt->fetch();
	
	$to = $res['email'];
	$subject = "PASSWORD CHANGE";
	$message = "
	<p>Hey there. You just changed your password. Why tho?</p>
	<p>Click below to go back to the login page.</p>
	<a href='http://localhost:8080/Camagru/app/views/login.php'>Camagru</a>
	";
	$headers = "change@camagru.com";
	mail($to, $subject, $message, $headers);
	header("Location: ../views/login.php");
}

if (isset($_POST["cUsername"]))
{
	$user = $_SESSION['username'];
	userin($_POST["bpassword"], $user);
	$password = password_hash(htmlentities($_POST["bpassword"]), PASSWORD_DEFAULT);

	$sql = "UPDATE `usrtbl` SET `pass` = :pass WHERE `username` = :username;";

	$stmt = $db->prepare($sql);
	$stmt->execute(array(":username" => $user, ":pass" => $password));

	$query = "SELECT `email` FROM `usrtbl` WHERE `username` = :username";
	$stmt = $db->prepare($query);
	$stmt->execute([':username' => $user]);
	$res = $stmt->fetch();
	
	$to = $res['email'];
	$subject = "PASSWORD CHANGE";
	$message = "
	<p>Hey there. You just changed your password. Why tho?</p>
	<p>Click below to go back to the login page.</p>
	<a href='http://localhost:8080/Camagru/app/views/login.php'>Camagru</a>
	";
	$headers = "change@camagru.com";
	mail($to, $subject, $message, $headers);
	header("Location: ../views/login.php");
}
?>