<?php
/* */
$servername = "localhost";
$username = "username";
$password = "password";
/* */

$DB_DSN = "localhost";
$DB_USER = "root";
$DB_PASSWORD = "###//_insert_password_here_//###";
$DB_DB_USERTABLE = "";
$DB_DB_IMAGETABLE = "";


try {
    $conn = new PDO("mysql:host=$servername;dbname=myDB", $username, $password);
    // set the PDO error mode to exception
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    echo "Connected successfully";
    }
catch(PDOException $e)
    {
    echo "Connection failed: " . $e->getMessage();
    }
?>