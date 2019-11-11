<?php

include_once "database.php";

try
{
    $db = new PDO($DB_DSN, $DB_RESU, $DB_SSAP);
    $db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    echo "<p style='color:green; font-weight:bold;'>Connected</p>";
}
catch (PDOException $err)
{
    echo "<p style='color:red; font-weight:bold;'>Connection failed: </p>";
}

?>