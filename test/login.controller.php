<?php

include_once "database.php";
include "error.check.php";
include_once "session.php";
include_once "connection.php";



if(isset($_POST['login'])){
	$user = htmlentities($_POST['username']);
	$password = htmlentities($_POST['password']);
	$query = "SELECT * FROM `users` WHERE `username` = :username";
	try {
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
		header("Location: loggedin.php");
	}
	}catch(PDOException $e)
	{
		echo $e->getMessage();
	}
}



// if (isset($_POST["login"]))
// {
// 	/* Below is just error handling. */
// 	userin($_POST["password"], $_POST["username"]);

// 	$username = htmlentities($_POST["username"]);
// 	$password = md5(htmlentities($_POST["password"]));

// 	/* Below is to check if the user exists in the database. */
// 	try
// 	{
// 		$sqlQuery = "SELECT * FROM users WHERE username = :username";
// 		$statement = $db->prepare($sqlQuery);
// 		$statement->execute(array(':username' => $username));
// 	}
// 	catch (PDOException $err)
// 	{
// 		echo "<p style='color: red;'>Failed to connect user.</P>".$username;
// 		// header("Location: failure.html");
// 	}

// 	while ($row = $statement->fetch())
// 	{
// 		$id = $row["id"];
// 		$hashed_password = $row["password"];
// 		$username = $row["username"];

// 		if ($hashed_password == $password)
// 		{
// 			$_SESSION["id"] = $id;
// 			$_SESSION["username"] = $username;
// 			header("Location: loggedin.html");

// 		}
// 	}
// }
// else
// 	header("Location: failure.html");
?>