<?php

function userin($password, $username)
{
	if (!preg_match('/^(?=.*\d)(?=.*[a-zA-Z]).{6,20}$/', $password))
	{
		header("Location: failure.html");
		exit();
	}
	if (preg_match('/\s/', $username))
	{
		header("Location: failure.html");
		exit();
	}
}

?>