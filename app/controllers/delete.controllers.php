<?php

include_once "session.controllers.php";
// include_once "email.controllers.php";
include_once "../../config/connection.php";
$pic = $_POST['Delete'];
unlink("/goinfre/jpieczar/Desktop/Mamp/apache2/htdocs/Camagru/app/img_database/".$pic."");
$query = "DELETE FROM `imgtbl` WHERE `postid` = '".$pic."'";
$stmt = $db->prepare($query);
$stmt->execute();
header("Location: ../views/mine.php");
?>