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
        $x = 0;
        echo $_SESSION['test'];
		if(empty($result))
			echo "<h1 class='main_top_logo'>Just grass and no posts...</h1>";
		else if (!empty($result))
		{
			// for ($i = 0; $i < $this->postsOD; $i++):
		}
		?>
		</div>
		<script src="/Camagru/js/scroll.js"></script>
	</body>
</html>