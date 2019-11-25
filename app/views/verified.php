<?php
	include "../controllers/session.controllers.php";
	require "header.html";
	include_once "../../config/connection.php";

	$email = $_GET["email"];

	$sql = "UPDATE `usrtbl` SET `verification` = 1 WHERE `email` = :email;";

	$stmt = $db->prepare($sql);
	$stmt->execute(array(":email" => $email));
?>
<html>
	<head>
		<title>Verified</title>
		<link rel="stylesheet" type= "text/css" href="style.css">
	</head>
	<body>
		<div class="main_centre_top"></div>
		<div class="main_centre_small">
			<h1 class="main_top_logo" >Verified</h1>
			<p class="main_top_logo" >You now have an active Camagru account.</p>
			<p class="main_top_logo" >Click <a href="login.php">HERE</a> to login to your account or simply click on the Camagru button<br>above to return to the main page.</p>
		</div>
	</body>
</html>
<?php
	require "footer.html";
?>