<?php
	include_once "../controllers/session.controllers.php";
	include_once "../controllers/profile.controllers.php";
	require "header.html";

	// if (!isset($_SESSION["username"]))
	// {
	// 	header("Location: ../../index.php");
	// }
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
				<input type="submit" name="submit" title="login" value="Logout">
			</form>
			<h1 class="main_top_logo">Change stuff here:</h1>
		</div>
	</body>
</html>
<?php
	require "footer.html";
?>