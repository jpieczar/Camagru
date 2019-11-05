<?php
include "database.php";
include "connection.php";

try
{
    $conn = new PDO($DB_SERVER_DB, $DB_USER, $DB_PASSWORD);
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    $query = "CREATE TABLE IF NOT EXISTS `usrtbl`
    (
        `id`			INT(11) auto_increment PRIMARY KEY NOT NULL,
        `verification`  BOOL NOT NULL DEFAULT 0, /* !0 means varified. */
		`sudo`			BOOL NOT NULL DEFAULT 0, /* Grants admin privileges. */
        `username`		TINYTEXT NOT NULL, /* 6+ characters long. */
        `email`			TINYTEXT NOT NULL, /* Should follow email format. */
        `pass`			TINYTEXT NOT NULL, /* Encode/decode the string. */
        `create_date`	DATETIME DEFAULT current_timestamp
    )";
    $conn->exec($query);
    echo "<p style='padding:20px; color:green;'>Created table ~~usrtbl~~</p>";
} 
catch (PDOException $err)
{
    echo "<p style='padding:20px; color:red;'>Failed to create table ~~usrtbl~~</p>".$err->getMessage();
}
try
{
    $conn = new PDO($DB_SERVER_DB, $DB_USER, $DB_PASSWORD);
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    $query = "CREATE TABLE IF NOT EXISTS `imgtbl`
    (
        `id`			INT(11) auto_increment PRIMARY KEY NOT NULL,
        `username`		TINYTEXT NOT NULL, /* Should match the user\'s username. */
        `path`          TINYTEXT NOT NULL, /* Encode/decode the string. */
        `create_date`	DATETIME DEFAULT current_timestamp
    )";
    $conn->exec($query);
    echo "<p style='padding:20px; color:green;'>Created table ~~imgtbl~~</p>";
} 
catch (PDOException $err)
{
    echo "<p style='padding:20px; color:red;'>Failed to create table ~~imgtbl~~</p>".$err->getMessage();
}
?>