<?php

/*
 * $id = $_SESSION["id"];
 * Use the above in the file name so that it is easy to fine the file author.
 * date("d/m/y").'_'.date("h:i:s").'_'.
*/
// var_dump($_POST["imgURL"]);
// var_dump($_POST["ovlURL"]);


if (isset($_POST["imgURL"]) && isset($_POST["ovlURL"]))
{
	$img = $_POST["imgURL"];
	$sti = $_POST["ovlURL"];
	$imgname = uniqid("Camagru_").".png";
	$imgURL = str_replace("data:image/png;base64,", "", $img);
	$imgURL = str_replace(" ", "+", $imgURL);
	$imgfrombase = base64_decode($imgURL);
	$stiURL = str_replace("data:image/png;base64,", "", $sti);
	$stiURL = str_replace(" ", "+", $stiURL);
	$stifrombase = base64_decode($stiURL);
	$pic = imagecreatefromstring($imgfrombase);
	$sticker = imagecreatefromstring($stifrombase);
	imagecopy($pic, $sticker, 0, 0, 0, 0, imagesx($pic), imagesy($pic));
	imagepng($pic, "/goinfre/jpieczar/Desktop/Mamp/apache2/htdocs/Camagru/photo_store/".$imgname);
}

?>