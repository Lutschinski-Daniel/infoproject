<?php
session_start();
include ('../../db/db_conn.php');
header("Content-Type: application/json");


$response = array();
$conn = db_conn::getInstance();
$params = array(
    "lecture-id" => $_SESSION['current_lecture_id'],
    "frage-typ" => $_GET['question']['frage-typ'],
    "frage-text" => $_GET['question']['frage-text'],
    "antwort-text" => $_GET['question']['antwort-text'],
    "difficulty" => $_GET['question']['difficulty'],
    "frequency" => $_GET['question']['frequency'],
    "points" => $_GET['question']['points'],
    "space-needed" => $_GET['question']['space-needed']
);

if( $conn->saveQuestion2DB($params) === false ) {
    $response = array('error' => 'Datenbankfehler beim Fragenerstellen!');
} else {
    $response = array('success' => 'Frage wurde erstellt!');
}
echo json_encode($response);
