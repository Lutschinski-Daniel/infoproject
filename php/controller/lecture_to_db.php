<?php
session_start();
include '../../db/db_conn.php';
header('Content-type: application/json');

if( isset($_SESSION['current_lecture_id'])) {
    unset($_SESSION['current_lecture_id']);
    unset($_SESSION['current_lecture_bez']);
}

$conn = db_conn::getInstance();
$params = array(
    "bezeichnung" => $_GET['bezeichnung'],
    "bezeichnung_kurz" => $_GET['bezeichnung_kurz'],
);
$conn->saveLecture2DB($params);

$conn = db_conn::getInstance();
$lecture = $conn->getLectureWithKurzBez($params['bezeichnung_kurz']);

$response = array();
if ($lecture != NULL) {
    $data = '<li class="lecture"><a href="#" id="' . $lecture['id'] . '" >'
                    . $lecture['bezeichnung_kurz'] . '</a></li>';
    $response = array ( 
        'success' => 'Vorlesung wurde erstellt!', 
        'data' => $data
    );
} else {
    $response = array (
        'error' => "Fehler beim Erstellen der Vorlesung!"
    ); 
}

echo json_encode($response);