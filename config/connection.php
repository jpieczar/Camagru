<?php
include "database.php";
try
{
    $conn = new PDO($DB_DSN, $DB_USER, $DB_PASSWORD);
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    $query = "CREATE DATABASE `".$DB_NAME."`";
    $conn->exec($query);
    echo "<p style='color:green;'>Database created</p>";
}
catch (PDOException $err)
{
    echo "<p style='color:red;'>Failed to create database</p>".$err->getMessage();
}
?>