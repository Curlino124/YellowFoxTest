<?php

class Analytics {

 private $data;

 // Daten initialisieren
 public function __construct($jsonData) {
  $this->data = $jsonData;
 }

 /* =================================
     Aufgabe 01 --> Fahrtzeit in s
 ================================= */
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

 /* ===========================================
     Aufgabe 02 --> zurückgelegte Entfernung
 =========================================== */

 // Berechnung zwischen 2 Punkten
 public function calculateDistance($lat1, $lon1, $lat2, $lon2) {

  $earthRadius = 6371;

  // Koordinaten --> Bogenmaß
  $lat1 = deg2rad($lat1);
  $lon1 = deg2rad($lon1);
  $lat2 = deg2rad($lat2);
  $lon2 = deg2rad($lon2);
 }

 // Differenzen
 $deltaLAT = $lat2 - $lat1;
 $deltaLON = $lon2 - $lon1;

 // Haversine Formel anwenden
 

}

?>