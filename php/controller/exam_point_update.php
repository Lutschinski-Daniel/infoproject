<?php
session_start();
header("Content-Type: application/json");
include("../../engine/ExamEngine.php");

$response = array();
if (isset($_GET['point_update'])) {
    if (isset($_SESSION['engine'])) {
        $engine = unserialize($_SESSION['engine']);
        $engine->updatePointsForId(intval($_GET['point_update']), intval($_GET['id']));
        $response = array('success' => 'Aufgabenpunkte für diese Klausur aktualisiert');
        $_SESSION['engine'] = serialize($engine);
    }
} else {
    $response = array('error' => 'Fehler beim aktualisieren der Aufgabenpunkte');
}

echo json_encode($response);
