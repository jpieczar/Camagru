<?php
include_once "session.controllers.php";
function getPosts()
{
	$images = glob("/goinfre/jpieczar/Desktop/Mamp/apache2/htdocs/Camagru/app/img_database/"."*.png");
	// foreach ($images as $pic)
	// {
	// 	$pic = explode('/', $pic)[10];
	// 	echo "<a href><img class='thumb' src='app/img_database/".$pic."' width='400px'></a>";
	// }
	return $images;
}

function totalPosts()
{
	$images = glob("/goinfre/jpieczar/Desktop/Mamp/apache2/htdocs/Camagru/app/img_database/"."*.png");
	return count($images);
}

function indexAction()
{
	
	$res = getPosts();
	$count = totalPosts();
	$lim = 6;
	if ($count >= $lim)
		$posts_d = $lim;
	else
		$posts_d = $count;

	if (isset($_POST['displayed_posts']))
	{
		if (($_POST['displayed_posts'] + $lim) >= $count)
			$postsOD = $count;
		else
			$postsOD = $_POST['displayed_posts'] + $lim;
	}

}

$_SESSION['test'] = "hi";

?>