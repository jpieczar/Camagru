<?php
session_start();
if (isset($_SESSION['id']))
	echo "<img src='/Camagru/img_resources/stickers/Smiley.gif' width='75px'>";
else
	echo "<img src='/Camagru/img_resources/stickers/Frownie.gif' width='75px'>";
?>