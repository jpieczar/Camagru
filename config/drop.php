<?php
   include_once "database.php";
   try
   {
      $conn = new PDO($DB_DSN, $DB_USER, $DB_PASSWORD);
      $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
      $query = "DROP DATABASE `".$DB_NAME."`";
      $conn->exec($query);
      echo "<p style='color: green;'>Database deleted.</P>";
   } 
   catch (PDOException $err)
   {
      echo "<p style='color: red;'>Unable to delete database.".$err->getMessage().".</P>";
   }
?>