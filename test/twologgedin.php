<?php

include_once "session.php";

echo "<h1>(2) loggedin (2)</h1>";
echo "<a href='loggedin.php'>Visit W3Schools.com!</a>";
echo "<p>You are logged in as</p>";

var_dump($_POST);

echo "<form action='logout.controller.php' method='post'>
    <input type='submit' name='logout' value='signout'>
</form>";