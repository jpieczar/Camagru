<?php
	include_once "../controllers/session.controllers.php";
	require "header.html";

	/* This prevents unauthorised page access. */
	// if (!isset($_SESSION["username"]))
	// {
	// 	header("Location: ../../index.php");
	// }
?>
<html>
	<head>
		<title>Camera</title>
		<link rel="stylesheet" type= "text/css" href="style.css">
	</head>
	<body>
		<div class="main_centre_top"></div>
			<div class="frame">
				<video id="video" width="500px" height="500px" class="polaroid"></video>
			</div>
				<form action="../controllers/camera.controllers.php" method="post">
					<input type="submit" name="Snap" title="Take picture" value="Take picture">
				</form>
				<form action="../controllers/camera.controllers.php" method="post">
					<input type="file" name="file">
					<input type="submit" name="Upload" title="Upload image" value="Upload image">
				</form>
			<!-- Camera stuff here. -->
			<div class="main_centre_small"></div>
			<div class="main_centre_top"></div> <!-- This is just a spacer -->
	</body>
</html>
<?php
	require "footer.html";
?>