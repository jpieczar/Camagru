<?php
include_once "session.controllers.php";
include_once "error.controllers.php";
include_once "email.controllers.php";
include_once "../../config/connection.php";

// var_dump($_GET);

// echo $_GET['postid'];
// echo $_GET['comment'];

/* Adds the comment. */
$comment = htmlentities($_GET['comment']);
$sql = "INSERT INTO `comtbl` (`comment`, `postid`)
VALUES (:comment, :postid);";
$stmt = $db->prepare($sql);
$stmt->execute(array(":comment" => $comment, ":postid" => $_GET['postid']));
header("Location: /Camagru/index.php");
exit();
?>