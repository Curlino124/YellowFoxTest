<?php

// Zugriff auf drive.json

$file = __DIR__ . '/data/drive.json';

// ??? funftioniert ???

if (file_exists($file)) {
 // Daten auslesen
 $data = file_get_contents($file);
 // Daten ausgeben
 echo "<pre>";
 echo htmlspecialchars($data);
 echo "</pre>";
} else {
  echo "irgendetwas funktioniert hier nicht";
}

?>