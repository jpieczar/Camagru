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
				?>
			</div>
			<div class="main_centre_top"></div> <!-- This is just a spacer -->
			<div class="frame2">
				<?php
					if (!isset($_SESSION["username"]))
					{
						echo "<br>";
						echo "<form action='/Camagru/app/controllers/like.controllers.php' method='post'>
						<input type='submit' name='like' title='like' value='Like'>
						</form>";
						echo "<form action='/Camagru/app/controllers/comment.controllers.php' method='post'>
						<input type='text' name='comment' title='comment' placeholder='Comment'>
						<input type='submit' name='comment' title='comment' value='Submit'>
						</form>";
					}
				?>
			</div>
			<div class="main_centre_top"></div> <!-- This is just a spacer -->
	</body>
</html>
<?php
	
	require "footer.php";
?>