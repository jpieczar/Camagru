<?php
	require "header.html";
	include_once "../controllers/register.controllers.php";
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
				<!-- <input type="password" placeholder="Re-enter Password"> -->
				<!--
					Please make a comeback dear "Re-enter password".
					We miss you o so much UWU.
				-->
			</form>
		</div>
	</body>
</html>
<?php
	require "footer.html";
?>