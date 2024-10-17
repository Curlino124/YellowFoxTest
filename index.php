<?php
// Zugriff Klasse Analytics
require_once __DIR__ . '/functions/analytics.php';

// Zugriff auf drive.json

$file = __DIR__ . '/data/drive.json';

// ??? funftioniert ???

 if (file_exists($file)) {
  // Daten auslesen
  $data = file_get_contents($file);
  //  Daten umwandeln
  $driveData = json_decode($data, true);
  // Daten ausgeben
   var_dump($driveData);
 } else {
   echo "irgendetwas funktioniert hier nicht";
 }

 echo '<hr style="margin: 3rem 0;">';

 // instanzieren
 $analytics = new Analytics($driveData);
 // Berechnung
 $result = $analytics->calculateSeconds();
 // Ausgabe
 echo $result;

?>