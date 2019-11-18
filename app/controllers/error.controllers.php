<?php

function userin($password, $username)
{
	if (!preg_match('/^(?=.*\d)(?=.*[a-zA-Z]).{6,20}$/', $password))
	{
		// echo "<p style='color:red; font-weight:bold;'>Password error</p>";
		header("Location: ../views/error.php");
		exit();
	}
	if (preg_match('/\s/', $username))
	{
		// echo "<p style='color:red; font-weight:bold;'>Username error</p>";
		header("Location: ../views/error.php");
		exit();
	}
}

function duplicator($username, $email, $db)
{
	$sql = "SELECT * FROM `usrtbl` WHERE `username` = :username OR `email` = :email LIMIT 1";
	$stmt = $db->prepare($sql);
	$stmt->execute(array(":username" => $username, ":email" => $email));
	$res = $stmt->fetch();
	if (!empty($res))
	{
		header("Location: ../views/error.php");
		exit();
	}
}

?>