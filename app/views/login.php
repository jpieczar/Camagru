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
		<title>Signin</title>
		<link rel="stylesheet" type= "text/css" href="/Camagru/css/style.css">
	</head>
	<body>
		<div class="main_centre_top"></div>
		<div class="main_centre_small">
			<h1 class="main_top_logo">Login Page</h1>
			<form action="../controllers/login.controllers.php" method="post" class="form">
				<input type="text" name="username" title="username" placeholder="Username" autocomplete="off">
				<input type="password" name="password" title="password" placeholder="Password">
				<input type="submit" name="submit" title="login" value="Login">
			</form>
			<h1 class="main_top_logo">If you forgot your password, use the form below</h1>
			<form action="../controllers/forgot.controllers.php" method="post" class="form">
				<input type="text" name="username" title="username" placeholder="Username">
				<input type="submit" name="forgot" title="forgot password" value="Forgot password">
			</form>
		</div>
	</body>
</html>
<?php
	require "footer.php";
?>