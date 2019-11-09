<?php

$username = "root";
$dsn = "mysql:host=localhost;dbname=register";
$password = "";

try
{
    $db = new PDO($dsn, $username, $password);
    $db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    echo "Connected";
}
catch (PDOException $ex)
{
    echo "Connection failed";
}