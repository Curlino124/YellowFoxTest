<?php
// Zugriff Klasse Analytics
require_once __DIR__ . '/functions/analytics.php';
// Datenbank- Stuff
require_once __DIR__ . '/database/config/connection.php';
require_once __DIR__ . '/database/database.php';

// Zugriff auf drive.json

$file = __DIR__ . '/json-data/drive.json';

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
  $time = $analytics->calculateSeconds();
  // ausgeben
  echo "Die Fahrtzeit beträgt " . $time . "Sekunden.";

  echo '<hr style="margin: 3rem 0;">';

  /* ============================================
      Aufgabe 02 --> zurückgelegte Entfernung
  ============================================ */

  echo '<h4>Aufgabe 2:</h4>';
  // Test
  $distance = $analytics->testDistance();

  echo "Die Entfernung zwischen den ersten beiden Punkten beträgt " . $distance . "km";
  echo '<br />';

  // Gesamtdistanz
  $totalDistance = $analytics->calculateTotal();

  echo "Die zurückgelegte Gesamtdistanz beträgt: " . $totalDistance . "km";

  echo '<hr style="margin: 3rem 0;">';

  /* ============================================
      Aufgabe 03 --> Ergebnisse in DB speichern
  ============================================ */

  $startTime = $driveData[0]['time'];
  $endTime = end($driveData)['time'];

  $database = new Database($pdo);
  $database->insertData($startTime, $endTime, $time, $totalDistance);

  ?>