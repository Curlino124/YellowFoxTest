<?php

require_once __DIR__ . '/../config/connection.php';
require_once __DIR__ . '/../database.php';

 $startTime = $_POST['startTime'] ?? null;
 $endTime = $_POST['endTime'] ?? null;
 $time = $_POST['time'] ?? null;
 $totalDistance = $_POST['totalDistance'] ?? null;

 $database = new Database($pdo);
 $response = $database->insertData($startTime, $endTime, $time, $totalDistance);

?>
