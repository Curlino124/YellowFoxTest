<?php
require_once __DIR__ . '/../config/connection.php';
require_once __DIR__ . '/../database.php';

$database = new Database($pdo);
$trips = $database->showData(); 

$html = '';
foreach ($trips as $trip) {
    $html .= '<tr>';
    $html .= '<td>' . $trip['data_id'] . '</td>'; // Fahrt ID
    $html .= '<td>' . $trip['Starttime'] . '</td>';
    $html .= '<td>' . $trip['Endtime'] . '</td>';
    $html .= '<td>' . $trip['Duration'] . '</td>';
    $html .= '<td>' . $trip['Distance'] . '</td>';
    $html .= '</tr>';
}

echo $html;
?>
