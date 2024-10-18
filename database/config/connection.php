<?php

 $host = 'localhost';
 $dbname = 'trips';
 $username = 'root';
 $password = '',

 try {
  $pdo = new PDO("mysql:host=$host; dbname=$dbname", $username, $password);
  $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ATTR_ERRMODE_EXCEPTION);
 } catch (PDOException $e) {
  echo "Verbindung fehlgeschlagen: " . $e->getMessage();
  die();
 }

?>