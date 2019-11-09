<?php

include_once "session.php";
include_once "database.php";

if ($_POST["signin"])
{
    $required_fields = array("username", "password");
}

?>

<h1>Login page</h1>

<form action="" method="post">
    <input type="text" name="username" placeholder="username" value="">
    <input type="password" name="password" placeholder="password" value="">
    <input type="submit" name="submit" placeholder="submit" value="signin">
</form>