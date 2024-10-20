<?php
// Zugriff Klasse Analytics
require_once __DIR__ . '/functions/analytics.php';
// Datenbank- Stuff
require_once __DIR__ . '/database/config/connection.php';
require_once __DIR__ . '/database/database.php';

// Zugriff auf drive.json

$file = __DIR__ . '/json-data/drive.json';

  // Daten auslesen
  $data = file_get_contents($file);
  //  Daten umwandeln
  $driveData = json_decode($data, true);

  /* =================================
      Aufgabe 01 --> Fahrtzeit in s
  ================================= */

  // instanzieren
  $analytics = new Analytics($driveData);
  // aufrufen
  $time = $analytics->calculateSeconds();

  /* ============================================
      Aufgabe 02 --> zurückgelegte Entfernung
  ============================================ */

  // Test
  $distance = $analytics->testDistance();

  echo "Die Entfernung zwischen den ersten beiden Punkten beträgt " . $distance . "km";

  // Gesamtdistanz
  $totalDistance = $analytics->calculateTotal();

  echo "Die zurückgelegte Gesamtdistanz beträgt: " . $totalDistance . "km";

  echo '<hr style="margin: 3rem 0;">';

  /* ============================================
      Aufgabe 03 --> Ergebnisse in DB speichern
  ============================================ */

  // $startTime = $driveData[0]['time'];
  // $endTime = end($driveData)['time'];

  // $database = new Database($pdo);
  // $database->insertData($startTime, $endTime, $time, $totalDistance);

  ?>

<!DOCTYPE html>
<html lang="de">
  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <link
      rel="stylesheet"
      href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css"
    />
    <link
      rel="stylesheet"
      href="https://cdn.datatables.net/1.10.24/css/dataTables.bootstrap4.min.css"
    />
    <link rel="stylesheet" href="view/style.css" />
    <title>YellowFox | Aufgabe</title>
  </head>
  <body>
    <div class="container-fluid">
     <div class="row">
      <!-- Daten -->
      <div class="01 Fahrdaten col-md-6">
       <h4 class="fw-bold mb-4">Fahrdaten:</h4>
        <div class="table-container">
            <table id="driveData" class="table table-hover table-bordered">
                <thead>
                    <tr>
                    <th>Uhrzeit</th>
                    <th>Breitengrad</th>
                    <th>Längengrad</th>
                    </tr>
                </thead>
                <tbody>
                 <?php foreach($driveData as $drivePoint): ?>
                 <tr>
                 <td><?= $drivePoint['time']; ?></td>
                 <td><?= $drivePoint['latitude']; ?></td>
                 <td><?= $drivePoint['longitude']; ?></td>
                 </tr>
                </tbody>
                <?php endforeach; ?>
            </table>
        </div>
      </div>
      
       <div class="col-md-6">
        <!-- Fahrzeit -->
        <div class="02 Fahrzeit mb-6">
         <h4 class="fw-bold mb-2">Fahrzeit in Sekunden:</h4>
        <div class="time-text">Die zurückgelegt Fahrtzeit beträgt: <span class="mr-1 "><?php echo $time; ?></span>Sekunden</div>
        <!-- Distanz -->
        <div class="03 Distanz mt-4">
         <h4 class="fw-bold">zurückgelegte Distanz:</h4>
       
        
       </div>
     </div>
    </div>

<script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.bundle.min.js"></script>
<script src="https://cdn.datatables.net/1.10.24/js/jquery.dataTables.min.js"></script>
<script src="https://cdn.datatables.net/1.10.24/js/dataTables.bootstrap4.min.js"></script>

<script src="https://cdn.datatables.net/buttons/1.7.1/js/dataTables.buttons.min.js"></script>
<script src="https://cdn.datatables.net/buttons/1.7.1/js/buttons.bootstrap4.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jszip/3.1.3/jszip.min.js"></script>
<script src="https://cdn.datatables.net/buttons/1.7.1/js/buttons.html5.min.js"></script>
<script src="https://cdn.datatables.net/buttons/1.7.1/js/buttons.print.min.js"></script>

<script src="view/script.js"></script>
    <!-- <script>
      $(document).ready(function () {
        $("#driveData").DataTable();
      });
    </script> -->
  </body>
</html>