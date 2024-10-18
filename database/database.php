<?php

class Database {

 private $pdo;

 // DB- Verbindung
 public function __construct($pdo) {

  $this->pdo = $pdo;
 }

 // Einfügen der Daten
 public function insertData($startTime, $endTime, $time, $totalDistance) {

  $sql = "INSERT INTO trips (Starttime, Endtime, Duration, Distance) VALUES (:starttime, :endtime, :duration, :distance)";
 
  $stmt = $this->pdo->prepare($sql);

  $stmt->bindParam(':starttime', $startTime);
  $stmt->bindParam(':endtime', $endTime);
  $stmt->bindParam(':duration', $time);
  $stmt->bindParam(':distance', $totalDistance);

  if ($stmt->execute()) {
   echo "Daten erfolgreich übermittelt";
  } else {
   echo "Fehler beim Eintragen in die Datenbank";
  }

 }
}

?>