<?php

/*
 * $id = $_SESSION["id"];
 * Use the above in the file name so that it is easy to fine the file author.
*/

if (isset($_POST["imgURL"]) && isset($_POST["ovlURL"]))
{
	$img = $_POST["imgURL"];
	$sti = $_POST["ovlURL"];
	$imgname = date("d/m/y").'_'.date("h:i:s").'_'.uniqid("Camagru_").".png";
	$imgURL = str_replace("data:image/png;base64,", "", $img);
	$imgURL = str_replace(" ", "+", $imgURL);
	$imgfrombase = base64_decode($imgURL);
	$stiURL = str_replace("data:image/png;base64,", "", $stiURL);
	$stiURL = str_replace(" ", "+", $stiURL);
	$stifrombase = base64_decode($stiURL);
	$pic = imagecreatefromstring($imgfrombase);
	$sticker = imagecreatefromstring($stifrombase);
	imagecopy($pic, $sticker, 0, 0, 0, 0, imagesx($pic), imagesy($pic));
	imgpng($pic, "/Camagru/test2/hold".$imgname)
}

?>