<?php

include_once "../../config/database.php";
include "error.controllers.php";
include_once "session.controllers.php";
include_once "../../config/connection.php";
include_once "email.controllers.php";

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
	include_once "logout.controllers.php";
}

if (isset($_POST["cUsername"]))
{
	$user = $_SESSION['username'];
	$uname = htmlentities($_POST["busername"]);
	userin("G00dPass", $uname);
	duplicator($uname, " ", $db);

	$sql = "UPDATE `usrtbl` SET `username` = :uname WHERE `username` = :username;";

	$stmt = $db->prepare($sql);
	$stmt->execute(array(":username" => $user, ":uname" => $uname));

	$query = "SELECT `email` FROM `usrtbl` WHERE `username` = :uname";
	$stmt = $db->prepare($query);
	$stmt->execute([':uname' => $uname]);
	$res = $stmt->fetch();
	
	$to = $res['email'];
	$subject = "USERNAME CHANGE";
	$message = "
	<p>Hey there. You just changed your username. Why tho?</p>
	<p>Click below to go back to the login page.</p>
	<a href='http://localhost:8080/Camagru/app/views/login.php'>Camagru</a>
	";
	$headers = "change@camagru.com";
	mail($to, $subject, $message, $headers);
	include_once "logout.controllers.php";
}

if (isset($_POST["cEmail"]))
{
	$user = $_SESSION['username'];
	$email = htmlentities($_POST["bemail"]);

	duplicator(" ", $email, $db);

	$sql = "UPDATE `usrtbl` SET `email` = :email WHERE `username` = :username;";

	$stmt = $db->prepare($sql);
	$stmt->execute(array(":username" => $user, ":email" => $email));

	session_unset();
	session_destroy();
	sendEmail($email);
}

if (isset($_POST["switch"]))
{
	$user = $_SESSION['username'];

	$sql = "UPDATE `usrtbl` SET `pref` = 0 WHERE `username` = :username;";

	$stmt = $db->prepare($sql);
	$stmt->execute(array(":username" => $user));

	header("Location: /Camagru/app/views/profile.php");
}

if (isset($_POST["switch2"]))
{
	$user = $_SESSION['username'];

	$sql = "UPDATE `usrtbl` SET `pref` = 1 WHERE `username` = :username;";

	$stmt = $db->prepare($sql);
	$stmt->execute(array(":username" => $user));

	header("Location: /Camagru/app/views/profile.php");
}
?>