<html>
	<?php
		include_once "app/controllers/session.controllers.php";
		include_once "app/views/header.html";
		include_once "app/views/footer.php";
	?>
	<head>
		<title>Camagru</title>
		<link rel="stylesheet" type= "text/css" href="/Camagru/css/style.css">
	</head>
	<body>
		<div class="main_centre_top"></div>
		<div class="feed">
		<?php
			$images = glob("/goinfre/jpieczar/Desktop/Mamp/apache2/htdocs/Camagru/app/img_database/"."*.png");
			foreach ($images as $pic)
			{
				$pic = explode('/', $pic)[10];
				echo "<img class='thumb' src='app/img_database/".$pic."' width='400px'>";
			}
		?>
		</div>
	</body>
</html>