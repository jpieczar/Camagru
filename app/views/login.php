<?php
	require "header.html";
	include_once "../controllers/register.controllers.php";
?>
<html>
	<head>
		<title>Signin</title>
		<link rel="stylesheet" type= "text/css" href="style.css">
	</head>
	<body>
		<div class="main_centre_top"></div>
		<div class="main_centre_small">
			<h1 class="main_top_logo">Login Page</h1>
			<form action="../controllers/login.controllers.php" method="post" class="form">
				<input type="text" name="username" title="username" placeholder="Username">
				<input type="password" name="password" title="password" placeholder="Password">
				<input type="submit" name="submit" title="login" value="Login">
			</form>
		</div>
	</body>
</html>
<?php
	require "footer.html";
?>