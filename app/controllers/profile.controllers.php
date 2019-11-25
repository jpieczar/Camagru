<?php

include_once "../../config/database.php";
include "error.controllers.php";
include_once "session.controllers.php";
include_once "../../config/connection.php";

if(isset($_POST['submit']))
{
	header("location: logout.controllers.php");
}
?>