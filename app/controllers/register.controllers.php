<?php
include_once "error.controllers.php";
include_once "email.controllers.php";
include_once "../../config/connection.php";


if (isset($_POST["submit"]))
{
	/* Below is to see if the input is correct. */
	userin($_POST["password"], $_POST["username"]);
	duplicator($_POST["username"], $_POST["email"], $db);

	if (!filter_var($_POST["email"], FILTER_VALIDATE_EMAIL))
	{
		// echo "<p style='color:red; font-weight:bold;'>Email error</p>";
		header("Location: ../views/error.php");
		exit();
	}

	$email = htmlentities($_POST["email"]);
    $username = htmlentities($_POST["username"]);
	$password = password_hash(htmlentities($_POST["password"]), PASSWORD_DEFAULT);

	/* Below adds the user. */
	try
	{
		$sql = "INSERT INTO `usrtbl` (`username`, `email`, `pass`)
		VALUES (:username, :email, :passwor);";

		$stmt = $db->prepare($sql);
		$stmt->execute(array(":username" => $username, ":email" => $email, ":passwor" => $password));
		
		// mkdir("/home/jono_p/Documents/Lamp/apache2/htdocs/Camagru/img/".$username, 0777, false); <<<***<<<***<<<***<<<***
		
		// echo "<p style='color:green; font-weight:bold;'>User added</p>";
		sendEmail($email);
	}
	catch (PDOException $err)
	{
		// echo "<p style='color: red;'>Failed to add user.</P>";
		header("Location: ../views/error.php");
	}
}
?>