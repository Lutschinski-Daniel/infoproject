<?php

session_start();

include '../../db/db_conn.php';

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
$conn->saveQuestion2DB($params);

echo "<h1>Frage wurde erstellt! Was aber wenn nicht?</h1>";
