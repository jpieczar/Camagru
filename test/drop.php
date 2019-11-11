<?php

include_once "database.php";

try
{
	$db = new PDO($DB_DSN, $DB_RESU, $DB_SSAP);
	$db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
	$sql = "DROP DATABASE `".$DB_EMAN."`";
	$db->exec($sql);
	echo "<p style='color: green;'>Database deleted</P>";
} 
catch (PDOException $err)
{
	echo "<p style='color: red;'>Unable to delete database</P>";
}

?>