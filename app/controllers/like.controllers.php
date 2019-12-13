<?php
include_once "session.controllers.php";
include_once "error.controllers.php";
include_once "email.controllers.php";
include_once "../../config/connection.php";

/* Checks if the like exists. */
$sql = "SELECT * FROM `liktbl` WHERE `id` = :userid AND `postid` = :postid LIMIT 1";
$stmt = $db->prepare($sql);
$stmt->execute(array(":userid" => $_SESSION['id'], ":postid" => $_GET['id']));
$res = $stmt->fetch();
if (empty($res))
{
	/* Adds the like. */
	$sql = "INSERT INTO `liktbl` (`id`, `postid`)
	VALUES (:userid, :postid);";
	$stmt = $db->prepare($sql);
	$stmt->execute(array(":userid" => $_SESSION['id'], ":postid" => $_GET['id']));
	/* Updates the `imgtbl` like. */
	$sql = "UPDATE `imgtbl` SET `likes` = `likes` + 1 WHERE `postid` = :postid;";
	$stmt = $db->prepare($sql);
	$stmt->execute(array(":postid" => $_GET['id']));
	header("Location: /Camagru/index.php");
	exit();
}
else
{
	header("Location: /Camagru/index.php");
	exit();
}
?>