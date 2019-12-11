<html>
	<?php
		include_once "app/controllers/session.controllers.php";
		include_once "config/connection.php";
		include_once "config/database.php";
		include_once "app/views/header.html";
		include_once "app/views/footer.php";

		/* #################################################################### */
	// $images = glob("/goinfre/jpieczar/Desktop/Mamp/apache2/htdocs/Camagru/app/img_database/"."*.png");
	// foreach ($images as $pic)
	// {
	// 	$pic = explode('/', $pic)[10];
	// 	echo "<a href><img class='thumb' src='app/img_database/".$pic."' width='400px'></a>";
	// }

	?>
	<head>
		<title>Camagru</title>
		<link rel="stylesheet" type= "text/css" href="/Camagru/css/style.css">
	</head>
	<body>
		<div class="main_centre_top"></div>
		<div class="feed">
		<?php
		
		$query = "SELECT * FROM `imgtbl` WHERE `num` > 0";
		$stmt = $db->prepare($query);
		$stmt->execute();
		$res = $stmt->fetch();
		$all = $stmt->rowCount();
		$lim = 6;
		$page = '';
		if (!isset($_GET['page']))
			$page = 1;
		else
		{
			if (is_numeric($_GET['page']))
				$page = $_GET['page'];
			else
				$page = 1;
		}
		$all_pages = ceil($all/$lim);
		$start = ($page - 1) * $lim;
		$query = "SELECT * FROM `imgtbl` LIMIT $start, $lim";
		$stmt = $db->prepare($query);
		$stmt->execute();
		while ($res = $stmt->fetch())
			echo "<a href='/Camagru/app/views/photo.php?id=".$res['postid']."'>
			<img src='/Camagru/app/img_database/".$res['postid']."' width='400px' class='thumb'>
			</a>";
		echo "<br>";
		for ($i = 1; $i <= $all_pages; $i++)
			echo "<a href='index.php?page=$i'> $i </a>";
		?>
		</div>
		<div class="main_centre_top"></div>
	</body>
</html>