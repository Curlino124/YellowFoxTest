<?php

class Analytics {

 private $data;

 // Daten initialisieren
 public function __construct($jsonData) {
  $this->data = $jsonData;
 }

 // Aufgabe 1 --> Fahrtzeit in Sekunden ...
 public function calculateSeconds() {

  // Daten prüfen
  if (empty($this->data) || count($this->data) <2) {
   return 0;
  }

  // erster und letzter Zeitstempel
  $startTime = strtotime($this->data[0]['time']);
  $endTime = strtotime($this->data[count($this->data) - 1]['time']);

  // Dauer
  $duration = $endTime - $startTime;

  return $duration;

 }

}

?>