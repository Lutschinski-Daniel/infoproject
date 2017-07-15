<?php

include '../../db/db_conn.php';

$conn = db_conn::getInstance();

if ($_GET['question']['frage-typ'] == 1) {
    echo "FA";
    $params = array(
        "frage-typ" => $_GET['question']['frage-typ'],
        "frage-text" => $_GET['question']['frage-text'],
        "antwort-text" => $_GET['question']['antwort-text'],
        "difficulty" => $_GET['question']['difficulty'],
        "frequency" => $_GET['question']['frequency'],
        "points" => $_GET['question']['points'],
        "space-needed" => $_GET['question']['space-needed']
    );
    $conn->saveQuestionToDB($_GET['question']);
}
if ($_GET['question']['frage-typ'] == 0) {
    echo "MC";
}

/*
id 0-32757)
welche VL?(0-255)

antwort (!!!)
punkte (0-100)

datum erstellung
datum zuletzt genutzt
*/