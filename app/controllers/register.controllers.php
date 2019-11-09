<?php
	/* I dunno mang. Just get your work done. */
	include_once "../../connection.php";

	$username = $_POST["username"];
	$email = $_POST["email"];
	$password = $_POST["password"];

	$stmt=$conn->prepare("INSERT INTO `usrtbl` (`username`, `email`, `pass`)
    VALUES	('$username', '$email', '$password');");
	$stmt = execute();
	// header("Location: ../views/register.php");
?>