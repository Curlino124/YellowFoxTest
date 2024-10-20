<?php

class Database {

 private $pdo;

 // DB- Verbindung
 public function __construct($pdo) {

  $this->pdo = $pdo;
 }

 // Anzeige der Daten
 public function showData() {

  $sql = "SELECT * FROM trips";
  $stmt = $this->pdo->query($sql);

  if ($stmt) {
   return $stmt->fetchAll(PDO::FETCH_ASSOC);
  }else {
   return [];
  }

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
   echo "Daten gespeichert";
  } else {
   echo "Fehler beim Eintragen in die Datenbank";
  }

 }
}

?>