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
 

 // Differenzen
 $deltaLAT = $lat2 - $lat1; // Breitegrade
 $deltaLON = $lon2 - $lon1; // Längengrade

 // Haversine Formel anwenden --> Zwischenergebnisse
 $a = sin($deltaLAT / 2) * sin($deltaLAT / 2) +
      cos($lat1) * cos($lat2) *
      sin($deltaLON / 2) * sin($deltaLON / 2);

 // Haversine Formel --> Winkelentfernung
 $c = 2 * atan2(sqrt($a), sqrt(1 -$a));

 // Entfernung
 $distance = $earthRadius * $c;

 // auf 2 Nachkomma runden
 return round($distance, 2);

 }

 // Testfunktion
 public function testDistance() {
  $lat1 = $this->data[0]['latitude'];
  $lon1 = $this->data[0]['longitude'];
  $lat2 = $this->data[1]['latitude'];
  $lon2 = $this->data[1]['longitude'];

  return $this->calculateDistance($lat1, $lon1, $lat2, $lon2);

 }

}


?>