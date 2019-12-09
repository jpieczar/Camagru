<?php
	include_once "../controllers/session.controllers.php";
	require "header.html";
	include_once "../controllers/session.controllers.php";


	// if (!isset($_SESSION["username"]))
	// {
	// 	/* Include an alert (Please login) */
	// 	header("Location: /Camagru");
	// }
?>
<html>
	<head>
		<title>Viewer</title>
		<link rel="stylesheet" type= "text/css" href="/Camagru/css/style.css">
	</head>
	<body>
		<div class="main_centre_top"></div>
			<div class="frame">
				<canvas id="canvas" style="position: absolute; margin-left: 25px; margin-top: 50px; width: 500px;"></canvas>
				<!-- Have the picture positioned her. -->
			</div>
			<div class="main_centre_top"></div> <!-- This is just a spacer -->
			<!-- <script src="/Camagru/js/main.js"></script> -->
	</body>
</html>
<?php
	require "footer.php";
?>