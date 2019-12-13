<?php
	include_once "../controllers/session.controllers.php";
	require "header.html";
	include_once "../controllers/register.controllers.php";
	if (isset($_SESSION["username"]))
	{
		header("Location: /Camagru/app/views/profile.php");
	}
?>
<html>
	<head>
		<title>Register</title>
		<link rel="stylesheet" type= "text/css" href="/Camagru/css/style.css">
	</head>
	<body>
		<div class="main_centre_top"></div>
		<div class="main_centre_small">
			<h1 class="main_top_logo">Registration Page</h1>
			<form action="../controllers/register.controllers.php" method="post" class="form">
				<input type="text" name="username" title="username" placeholder="Username">
				<input type="email" name="email" title="email" placeholder="Email">
				<input type="password" name="password" title="password" placeholder="Password">
				<input type="submit" name="submit" title="register" value="Register">
			</form>
		</div>
	</body>
</html>
<?php
	require "footer.php";
?>