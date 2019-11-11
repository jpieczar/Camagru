<?php

include_once "database.php";

try /* Creates the database. */
{
	$db = new PDO($DB_DSN, $DB_RESU, $DB_SSAP);
	$db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
	$sql = "CREATE DATABASE IF NOT EXISTS `".$DB_EMAN."`";
	$db->exec($sql);
	echo "<p style='color:green; font-weight:bold;'>Databse created</p>";
}
catch (PDOException $err)
{
	echo "<p style='color:red; font-weight:bold;'>Database creation failed: </p>";
}

try	/* Creates the table. */
{
	$db = new PDO($DB_SERVER_DSN, $DB_RESU, $DB_SSAP);
	$db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
	$sql = "CREATE TABLE IF NOT EXISTS `users`
	(
		`id`			INT(11) auto_increment PRIMARY KEY NOT NULL,
        `verification`  BOOL NOT NULL DEFAULT 0, /* !0 means varified. */
		`sudo`			BOOL NOT NULL DEFAULT 0, /* Grants admin privileges. */
        `username`		TINYTEXT NOT NULL, /* 6+ characters long. */
        `email`			TINYTEXT NOT NULL, /* Should follow email format. */
        `pass`			TINYTEXT NOT NULL, /* Encode/decode the string. */
        `create_date`	DATETIME DEFAULT current_timestamp
	)
	";
	$db->exec($sql);
	echo "<p style='color:green; font-weight:bold;'>Table ~users~ created</p>";
}
catch (PDOException $err)
{
	echo "<p style='color:red; font-weight:bold;'>Table creation failed: </p>";
}

try	/* Inserts 5 test users to the table. */
{
	$pass = md5("thisismypaSS$123");
    $ssap = md5("thisismypaSS$321");
	$db = new PDO($DB_SERVER_DSN, $DB_RESU, $DB_SSAP);
	$db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
	$sql = "INSERT INTO `users` (`sudo`, `verification`, `username`, `email`, `pass`)
    VALUES	('1', '1', 'adminME', 'adminme@camagru.com', '$pass'),
    ('0', '1', 'alice_palace', 'alice@gmail.com', '$ssap'),
    ('0', '0', 'bobby_dobby', 'bobby@gmail.com', '$ssap'),
    ('0', '0', 'claire_bear', 'claire@gmail.com', '$pass'),
    ('0', '1', 'derrick_avenue', 'derrick@gmail.com', '$pass');
    WHERE NOT EXISTS (SELECT `username` FROM `users`)
	";
	$db->exec($sql);
	echo "<p style='color:green; font-weight:bold;'>Users added</p>";
}
catch (PDOException $err)
{
	echo "<p style='color:red; font-weight:bold;'>Failed to add users: </p>";
}

?>