<?php

include_once "session.php";

echo "<h1>(1) loggedin (1)</h1>";
echo "<a href='twologgedin.php'>Visit W3Schools.com!</a>";
echo "<p>You are logged in as</p>";

var_dump($_SESSION);

echo "<form action='logout.controller.php' method='post'>
    <input type='submit' name='logout' value='signout'>
</form>";

