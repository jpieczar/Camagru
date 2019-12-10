<?php
include_once "database.php";

try
{
    $db = new PDO($DB_DSN, $DB_USER, $DB_PASSWORD);
    $db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    $query = "CREATE DATABASE IF NOT EXISTS `".$DB_NAME."`";
    $db->exec($query);
    echo "<p style='color:green;'>Database created</p>";
}
catch (PDOException $err)
{
    echo "<p style='color:red;'>Failed to create database</p>".$err->getMessage();
}

$db = new PDO($DB_SERVER_DB, $DB_USER, $DB_PASSWORD);
$db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

try /* Create table usrtbl. */
{
    $query = "CREATE TABLE IF NOT EXISTS `usrtbl`
    (
        `id`			INT(11) auto_increment PRIMARY KEY NOT NULL,
        `verification`  BOOL NOT NULL DEFAULT 0, /* !0 means varified. */
		`sudo`			BOOL NOT NULL DEFAULT 0,  /*Grants admin privileges.*/
        `username`		TINYTEXT NOT NULL, /* 6+ characters long. */
        `email`			TINYTEXT NOT NULL, /* Should follow email format. */
        `pass`			TINYTEXT NOT NULL, /* Encode/decode the string. */
        `create_date`	DATETIME DEFAULT current_timestamp
    )";
    $db->exec($query);
    echo "<p style='color:green;'>Created table ~~usrtbl~~</p>";
} 
catch (PDOException $err)
{
    echo "<p style='color:red;'>Failed to create table ~~usrtbl~~</p>".$err->getMessage();
}

try /* Create table imgtbl. */
{
    $query = "CREATE TABLE IF NOT EXISTS `imgtbl`
    (
        `id`			INT(11) NOT NULL, /* User id */
        `postid`		CHAR(255) NOT NULL, /* Should match the user\'s username. */
        `num`          INT(11) auto_increment PRIMARY KEY NOT NULL,
        `likes`         INT(11) NOT NULL DEFAULT 0, /* This stores the likes. */
        `create_date`	DATETIME DEFAULT current_timestamp
    )";
    $db->exec($query);
    echo "<p style='color:green;'>Created table ~~imgtbl~~</p>";
} 
catch (PDOException $err)
{
    echo "<p style='color:red;'>Failed to create table ~~imgtbl~~</p>".$err->getMessage();
}
// try
// {   /* Create an admin and 4 test users. */
//     $pass = md5("thisismypaSS$123");
//     $ssap = md5("thisismypaSS$321");
//     $db = new PDO($DB_SERVER_DB, $DB_USER, $DB_PASSWORD);
//     $db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
//     $query = "INSERT INTO `usrtbl` (`sudo`, `verification`, `username`, `email`, `pass`)
//     VALUES	('1', '1', 'adminME', 'adminme@camagru.com', '$pass'),
//     ('0', '1', 'alice_palace', 'alice@gmail.com', '$ssap'),
//     ('0', '0', 'bobby_dobby', 'bobby@gmail.com', '$ssap'),
//     ('0', '0', 'claire_bear', 'claire@gmail.com', '$pass'),
//     ('0', '1', 'derrick_avenue', 'derrick@gmail.com', '$pass');
//     WHERE NOT EXISTS (SELECT `username` FROM `usrtbl`)
//     ";
//     $db->exec($query);
//     echo "<p style='color:green;'>Admin created</p>";
// } 
// catch (PDOException $err)
// {
//     echo "<p style='color:red;'>Failed to create user: admin</p>".$err->getMessage();
// }
?>