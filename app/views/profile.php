<?php
	include_once "../controllers/session.controllers.php";
	require "header.html";

	/* This prevents unauthorised page access. */
	if (!isset($_SESSION["username"]))
	{
		header("Location: ../../index.php");
	}
?>
<html>
	<head>
		<title>Profile page</title>
		<link rel="stylesheet" type= "text/css" href="style.css">
	</head>
	<body>
		<div class="main_centre_top"></div>
		<div class="main_centre_small">
			<h1 class="main_top_logo">Welcome</h1>
			<?php
				echo $_SESSION['username'];
			?>
			<form action="../controllers/logout.controllers.php" method="post" class="form">
				<input type="submit" name="submit" title="logout" value="Logout">
			</form>
			<h1 class="main_top_logo">Change stuff here:</h1>
			<form action="../controllers/profile.controllers.php" method="post" class="form">
				<input type="email" name="bemail" title="Change email" placeholder="Change Email">
				<input type="submit" name="cEmail" title="Change email" value="Change Email">
			</form>
			<form action="../controllers/profile.controllers.php" method="post" class="form">
				<input type="password" name="bpassword" title="Change password" placeholder="Change Password">
				<input type="submit" name="cPassword" title="Change password" value="Change Password">
			</form>
			<form action="../controllers/profile.controllers.php" method="post" class="form">
				<input type="text" name="busername" title="Change username" placeholder="Change Username">
				<input type="submit" name="cUsername" title="Change username" value="Change Username">
			</form>
		</div>
	</body>
</html>
<?php
	require "footer.html";
?>