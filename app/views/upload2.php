<?php
	include_once "../controllers/session.controllers.php";
	require "header.html";
	include_once "../controllers/session.controllers.php";


	// if (!isset($_SESSION["username"]))
	// {
	// 	header("Location: /Camagru");
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
				<?php
					if(isset($_POST['submit']))
					{
						$file = $_FILES['file'];
						$filename = $_FILES['file']['name'];
						$filetempname = $_FILES['file']['tmp_name'];
						$fileExt = explode('.', $filename);
						$fileactuallyExt = strtolower(end($fileExt));
						$allow = array('jpg', 'jpeg', 'png');
						if(in_array($fileactuallyExt, $allow))
						{
							$fileNewName = "camagru".uniqid("").".png";
							$fileDestination = '/goinfre/jpieczar/Desktop/Mamp/apache2/htdocs/Camagru/app/img_database/'.$fileNewName;
							move_uploaded_file($filetempname, $fileDestination);
							$_FILES['file'] = NULL;
						}
					}
				?>
				<canvas id="canvas" style="position: absolute; margin-left: 25px; margin-top: 50px; width: 500px;"></canvas> <!-- The image goes here -->
				<canvas id="overlay" style="position: absolute; margin-left: 25px; margin-top: 50px; width: 500px;"></canvas>
				<p class="rainbow">This is a polaroid.</p>
			</div>
			<div>
				<button id="clear-button" class="snap">>>>>CLEAR<<<<</button>
				<button id="save-button" class="snap">>>>>SAVE<<<<</button>
				<form name="form1" action="" method="post" enctype="multipart/form-data">
					<input type="file" name="file">
					<input type="submit" name="submit" value="upload">
				</form>
			</div>
			<div class="main_centre">
			<img style="width:100px;height:100px;" src="/Camagru/img_resources/stickers/recycle.png" id="recycle" onclick="addSticker(this.id)" alt="404_recycle" title="recycle">
			<img style="width:100px;height:100px;" src="/Camagru/img_resources/stickers/comedy.png" id="comedy" onclick="addSticker(this.id)" alt="404_comedy" title="comedy">
			<img style="width:100px;height:100px;" src="/Camagru/img_resources/stickers/beans.png" id="beans" onclick="addSticker(this.id)" alt="404_beans" title="beans">
			<img style="width:100px;height:100px;" src="/Camagru/img_resources/stickers/pepe.png" id="pepe" onclick="addSticker(this.id)" alt="404_pepe" title="pepe">
			<img style="width:100px;height:100px;" src="/Camagru/img_resources/stickers/pepe2.png" id="pepe2" onclick="addSticker(this.id)" alt="404_pepe" title="pepe2">
			<img style="width:100px;height:100px;" src="/Camagru/img_resources/stickers/pepe3.png" id="pepe3" onclick="addSticker(this.id)" alt="404_pepe" title="pepe3">
			<img style="width:100px;height:100px;" src="/Camagru/img_resources/stickers/spiral_frame.png" id="spiral_frame" onclick="addSticker(this.id)" alt="404_s_frame" title="spiral_frame">
			<img style="width:100px;height:100px;" src="/Camagru/img_resources/stickers/party_frame.png" id="party_frame" onclick="addSticker(this.id)" alt="404_p_frame" title="party_frame">
			</div>
			<div class="main_centre_top"></div> <!-- This is just a spacer -->
			<!-- <script src="/Camagru/js/up.js"></script> -->
	</body>
</html>
<?php
	require "footer.php";
?>