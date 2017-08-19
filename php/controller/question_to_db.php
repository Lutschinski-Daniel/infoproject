<?php
session_start();
include ('../../db/db_conn.php');
header("Content-Type: application/json");

$response = array();
$conn = db_conn::getInstance();
$params = array(
    "lecture-id" => $_SESSION['current_lecture_id'],
    "frage-typ" => $_POST['question']['frage-typ'],
    "frage-text" => substr($_POST['question']['frage-text'], 0, 4095),
    "antwort-text" => substr($_POST['question']['antwort-text'], 0, 40950),
    "difficulty" => $_POST['question']['difficulty'],
    "frequency" => $_POST['question']['frequency'],
    "points" => $_POST['question']['points'],
    "space-needed" => $_POST['question']['space-needed']
);

if( $conn->saveQuestion2DB($params) === false ) {
    $response = array('error' => 'Datenbankfehler beim Fragenerstellen!');
} else {
    $response = array('success' => 'Frage wurde erstellt!');
}
echo json_encode($response);
