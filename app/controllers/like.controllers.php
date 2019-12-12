<?php
include_once "session.controllers.php";
include_once "error.controllers.php";
include_once "email.controllers.php";
include_once "../../config/connection.php";


if (isset($_POST["submit"]))
{
	/* Below adds the user. */
	try
	{
		$sql = "INSERT INTO `liktbl` (`userid`, `postid`)
		VALUES (:userid, :postid);";

		$stmt = $db->prepare($sql);
		$stmt->execute(array(":userid" => $username, ":postid" => $email));

		$sql = "UPDATE `imgtbl` SET `likes` = `likes` + 1 WHERE `id` = :username;";
		$stmt = $db->prepare($sql);
		$stmt->execute(array(":username" => $user, ":pas" => $password));


		header("Location: /Camagru/index.php");
	}
	catch (PDOException $err)
	{
		// echo "<p style='color: red;'>Failed to add user.</P>";
		header("Location: ../views/error.php");
	}
}
?>