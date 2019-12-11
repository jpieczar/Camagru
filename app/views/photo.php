<?php
	include_once "../controllers/session.controllers.php";
	require "header.html";
	include_once "../controllers/session.controllers.php";
	include_once "../../config/connection.php";

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
					$query = "SELECT * FROM `imgtbl` WHERE `postid` = :postid";
					$stmt = $db->prepare($query);
					$stmt->execute([':postid' => $_GET['id']]);
					$res = $stmt->fetch();
					echo "<p>".$res['likes']."</p>";
					echo "<a href='/Camagru/app/views/user.php?user=".$res['id']."'>
					<img src='/Camagru/app/img_database/".$_GET['id']."' style='position: absolute; margin-left: 25px; margin-top: 50px; width: 500px;'>
					</a>";
					if (isset($_SESSION["username"]))
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