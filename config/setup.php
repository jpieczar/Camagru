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

try /* Create table liktbl. */
{
    $query = "CREATE TABLE IF NOT EXISTS `liktbl`
    (
        `id`			INT(11) PRIMARY KEY NOT NULL, /* User id */
        `postid`		CHAR(255) NOT NULL /* Should match the user\'s username. */
    )";
    $db->exec($query);
    echo "<p style='color:green;'>Created table ~~liktbl~~</p>";
} 
catch (PDOException $err)
{
    echo "<p style='color:red;'>Failed to create table ~~liktbl~~</p>".$err->getMessage();
}

try /* Create table comtbl. */
{
    $query = "CREATE TABLE IF NOT EXISTS `comtbl`
    (
        `id`			INT(11) PRIMARY KEY NOT NULL, /* User id */
        `postid`		CHAR(255) NOT NULL, /* Should match the user\'s username. */
        `comment`       CHAR(255)  NOT NULL /* This stores the comment. */
    )";
    $db->exec($query);
    echo "<p style='color:green;'>Created table ~~comtbl~~</p>";
} 
catch (PDOException $err)
{
    echo "<p style='color:red;'>Failed to create table ~~comtbl~~</p>".$err->getMessage();
}
?>