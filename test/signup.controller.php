<?php

include_once "database.php";
include "error.check.php";

if (isset($_POST["submit"]))
{
	/* Below is to see if the input is correct. */
	// $form_errors = array($email, $username, $password);
	userin($_POST["password"], $_POST["username"]);
	if (!filter_var($_POST["email"], FILTER_VALIDATE_EMAIL))
	{
		header("Location: failure.html");
		exit();
	}

	$email = htmlentities($_POST["email"]);
    $username = htmlentities($_POST["username"]);
	$password = password_hash(htmlentities($_POST["password"]), PASSWORD_DEFAULT);

	/* Below adds the user. */
	try
	{
		$db = new PDO($DB_SERVER_DSN, $DB_RESU, $DB_SSAP);
		$db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
		$sql = "INSERT INTO `users` (`username`, `email`, `pass`)
		VALUES (:username, :email, :password);";

		$stmt = $db->prepare($sql);
		$stmt->execute(array(":username" => $username, ":email" => $email, ":password" => $password));

		// echo "<p style='color:green; font-weight:bold;'>User added</p>";
		header("Location: success.html");
	}
	catch (PDOException $err)
	{
		// echo "<p style='color: red;'>Failed to add user.</P>";
		header("Location: failure.html");
	}
}

/*
		
		*--------------------------------------------------------------------------*
		| The code below is not safe to use as it does not use prepared statements |
		| to protect against SQL injections.									   |
		*--------------------------------------------------------------------------*

		$db = new PDO($DB_SERVER_DSN, $DB_RESU, $DB_SSAP);
		$db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
		$sql = "INSERT INTO `users` (`username`, `email`, `pass`)
		VALUES ('$username', '$email', '$password');";

		$db->exec($sql);

		*/

?>