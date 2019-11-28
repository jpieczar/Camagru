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
		<link rel="stylesheet" type= "text/css" href="/Camagru/css/style.css">
	</head>
	<body>
		<div class="main_centre_top"></div>
			<div class="frame">
				<video id="video" width="500px" height="500px" class="polaroid"></video>
			</div>
			<div>
				<button id="photo_button" class="snap">
					>>>>SNAP<<<<
				</button>
				<button id="photo_button" class="snap">
					>>>>CLEAR<<<<
				</button>
			</div>
				<!-- <form action="../controllers/camera.controllers.php" method="post">
					<input type="file" name="file">
					<input type="submit" name="Upload" title="Upload image" value="Upload image">
				</form> -->
			<!-- Camera stuff here. -->
			<div class="main_centre_small">
				<canvas id="canvas"></canvas>
			</div>
			<div class="main_centre_top"></div> <!-- This is just a spacer -->
	</body>
</html>
<?php
	require "footer.html";
?>