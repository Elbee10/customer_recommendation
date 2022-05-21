<?php
 $DB = "reccomendationPhpDB";
 $PASSWORD = "";
 $USERNAME = "root";
 $CONNECTION = "localhost";

 try {
     $conn = new PDO("mysql:host=$CONNECTION, dbname=$$DB", $USERNAME, $PASSWORD );
     $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
     echo"Connection successful";
 } catch (PDOException $e) {
     echo"connection failed". $e->getMessage();
 }
?>