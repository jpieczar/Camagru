<?php
   include_once "database.php";
   include_once "connection.php";
   try
   {
      // $db = new PDO($DB_DSN, $DB_USER, $DB_PASSWORD);
      // $db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
      $query = "DROP DATABASE `".$DB_NAME."`";
      $db->exec($query);
      echo "<p style='color: green;'>Database deleted.</P>";
   } 
   catch (PDOException $err)
   {
      echo "<p style='color: red;'>Unable to delete database: ".$err->getMessage().".</P>";
   }
?>
