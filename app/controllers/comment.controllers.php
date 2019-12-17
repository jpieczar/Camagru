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

$new = "SELECT * FROM `usrtbl` WHERE `id` = :userid";
$st = $db->prepare($new);
$st->execute(array(":userid" => $_SESSION["id"]));
$nres = $st->fetch();

if ($nres["pref"] == 0)
{
	$to = $nres["email"];
$subject = "NOTIFICATION";
$message = "
<p>Someone commented on your post.</p>";
$headers = "commented@camagru.com";
mail($to, $subject, $message, $headers);
}

// $stmt->execute(array(":postid" => $_GET['id']));
header("Location: /Camagru/index.php");
exit();
?>