<?php

include_once "session.controllers.php";

/*
 * $id = $_SESSION["id"];
 * Use the above in the file name so that it is easy to fine the file author.
 * date("d/m/y").'_'.date("h:i:s").'_'.
*/


if (isset($_POST["imgURL"]) && isset($_POST["ovlURL"]) && isset($_SESSION["id"]))
{
	$img = $_POST["imgURL"];
	$sti = $_POST["ovlURL"];
	$imgname = $_SESSION["id"]."_camagru_".uniqid("").".png";
	$imgURL = str_replace("data:image/png;base64,", "", $img);
	$imgURL = str_replace(" ", "+", $imgURL);
	$imgfrombase = base64_decode($imgURL);
	$stiURL = str_replace("data:image/png;base64,", "", $sti);
	$stiURL = str_replace(" ", "+", $stiURL);
	$stifrombase = base64_decode($stiURL);
	$pic = imagecreatefromstring($imgfrombase);
	$sticker = imagecreatefromstring($stifrombase);
	imagecopy($pic, $sticker, 0, 0, 0, 0, imagesx($pic), imagesy($pic));
	imagepng($pic, "/goinfre/jpieczar/Desktop/Mamp/apache2/htdocs/Camagru/app/img_database/".$imgname);
}
// "camagru".uniqid("").
?>