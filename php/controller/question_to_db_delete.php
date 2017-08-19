<?php

header('Content-type: application/json');
include '../../db/db_conn.php';

$response = array();
if (isset($_GET['delete_id'])) {    
    $id = intval($_GET['delete_id']);
    $conn = db_conn::getInstance();
    
    if( $conn->deleteQuestionFromDB($id) === false ){
        $response = array ("error" => "Fehler beim Löschvorgang!");
    } else {
        $response = array ("success" => "Aufgabe aus Datenbank gelöscht!");
    }
}

echo json_encode($response);

