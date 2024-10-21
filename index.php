<?php
require_once __DIR__ . '/functions/analytics.php';
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

 $analytics = new Analytics($driveData);
 $time = $analytics->calculateSeconds();

  /* ============================================
      Aufgabe 02 --> zurückgelegte Entfernung
  ============================================ */

  // Test
  // $distance = $analytics->testDistance();
  // Gesamtdistanz
  $totalDistance = $analytics->calculateTotal();

  /* ============================================
      Aufgabe 03 --> Ergebnisse in DB speichern
  ============================================ */

  $startTime = $driveData[0]['time'];
  $endTime = end($driveData)['time'];

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
    <div class="container-fluid p-4">
     <div class="row">
      <!-- Daten -->
      <div class="01 Fahrdaten col-md-6 px-4">
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
        <div class="Antwort Fahrzeit">
         <h4 class="fw-bold">Fahrzeit in Sekunden:</h4>
         <div class="time-text">Die zurückgelegt Fahrtzeit beträgt: <span class="mr-1 "><?php echo $time; ?></span>Sekunden</div>
        </div>
        <!-- Distanz -->
        <div class="Antwort Distanz my-4">
         <h4 class="fw-bold">zurückgelegte Distanz:</h4>
         <div class="time-text">Die zurückgelegt Distanz beträgt: <span class="mr-1 "><?php echo $totalDistance; ?></span>Kilometer</div>
       </div>
       <!-- in DB speichern -->
        <div class="Antwort Speichern mt-4 mx-4">
         <button id="saveData" class="btn btn-primary w-100">Daten speichern</button>
        </div>
        <hr>
       <!-- Tabelle -->
        <div class="Antwort Anzeigen">
         <div class="d-flex justify-content-between">
          <h4>gespeicherte Fahrten</h4>
         <button id="showDataBtn" class="btn btn-info mb-3 mx-4">Daten anzeigen</button>
         </div>
         
         <div class="table-container mt-4">
          <table id="showData" class="tableAnswer table table-bordered table-hover">
           <thead>
            <tr>
             <th>Fahrt</th>
             <th>Startzeit</th>
             <th>Endzeit</th>
             <th>Dauer (s)</th>
             <th>Distanz (km)</th>
            </tr>
           <tbody>
             <tr>
              <td id="fahrt"></td>
              <td id="startzeit"></td>
              <td id="endzeit"></td>
              <td id="dauer"></td>
              <td id="distanz"></td>
             </tr>
           </tbody>
            </thead>
          </table>
         </div>

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

<script>
$(document).ready(function() {

  $("#saveData").click(function() {
      const startTime = <?= json_encode($startTime); ?>;
      const endTime = <?= json_encode($endTime); ?>;
      const time = <?= json_encode($time); ?>;
      const totalDistance = <?= json_encode($totalDistance); ?>;

      $.ajax({
          url: 'database/AJAX/save_data.php',
          type: 'POST',
          data: {
              startTime: startTime,
              endTime: endTime,
              time: time,
              totalDistance: totalDistance
          },
          success: function(response) {
               alert(response);
              }
      });
    });
});
</script>
</body>
</html>