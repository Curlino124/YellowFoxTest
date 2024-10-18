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
   echo '<span style="color: red;">irgendetwas funktioniert hier nicht !!!</span>';
  }

  echo '<hr style="margin: 3rem 0;">';

  /* =================================
      Aufgabe 01 --> Fahrtzeit in s
  ================================= */

  echo '<h4>Aufgabe 1:</h4>';
  // instanzieren
  $analytics = new Analytics($driveData);
  // aufrufen
  $result = $analytics->calculateSeconds();
  // ausgeben
  echo "Die Fahrtzeit beträgt " . $result . "Sekunden.";

  echo '<hr style="margin: 3rem 0;">';
  
  /* =========================================
      Aufgabe 02 --> zurückgelegte Entfernung
  ========================================= */

  ?>