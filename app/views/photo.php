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
				<?php
					echo "<img src='/Camagru/app/img_database/".$_GET['id']."' style='position: absolute; margin-left: 25px; margin-top: 50px; width: 500px;'>";
					if (!isset($_SESSION["username"]))
					{
						echo "<br>";
						echo "<button>*** Like ***</button>";
					}
				?>
			</div>
			<div class="main_centre_top"></div> <!-- This is just a spacer -->
	</body>
</html>
<?php
	
	require "footer.php";
?>