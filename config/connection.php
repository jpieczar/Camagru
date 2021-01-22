<?php
include_once "database.php";

try
{
    $db = new PDO($DB_SERVER_DB, $DB_USER, $DB_PASSWORD);
    $db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    // echo "<p style='color:green;'>Connected</p>";
}
catch (PDOException $err)
{
    echo "<p style='color:red;'>Failed to connect</p>".$err->getMessage();
}
?>
