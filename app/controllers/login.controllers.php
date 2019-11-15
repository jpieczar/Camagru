<?php

include_once "../../config/database.php";
include "error.controllers.php";
include_once "session.controllers.php";
include_once "../../config/connection.php";



if(isset($_POST['submit']))
{
	$user = htmlentities($_POST['username']);
	$password = htmlentities($_POST['password']);
	$query = "SELECT * FROM `usrtbl` WHERE `username` = :username";
	try
	{
		$db = new PDO($DB_SERVER_DB, $DB_USER, $DB_PASSWORD);
		$stmt = $db->prepare($query);
		$stmt->execute([':username' => $user]);
		$res = $stmt->fetch();
		if (password_verify($_POST["password"], $res['pass']))
		{
			$username = $res['username'];
			$id = $res['id'];
			session_start();
			$_SESSION["id"] = $id;
			$_SESSION["username"] = $username;
			// session_write_close();
			// echo $_SESSION["id"];
			header("Location: ../../index.php");
		}
	}
	catch (PDOException $e)
	{
		// echo $e->getMessage();
		echo "<p style='color:red; font-weight:bold;'>Login error</p>";
	}
}
?>