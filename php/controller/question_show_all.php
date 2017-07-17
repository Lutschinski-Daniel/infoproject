<?php

session_start();
include("../../libs/Smarty.class.php");
include '../../db/db_conn.php';

header('Content-type: application/json');

if (isset($_SESSION['current_lecture_bez'])) {
    $conn = db_conn::getInstance();
    $questions = $conn->getAllQuestions4Lec($_SESSION['current_lecture_id']);
    echo json_encode($questions);
} else {
    echo "<h1>Eine Vorlesung auswählen, um alle Fragen anzuzeigen!</h1>";
}
