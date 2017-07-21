<?php
include '../../db/db_conn.php';

$conn = db_conn::getInstance();
header('Content-type: application/json');
$response = array();

if (isset($_GET['delete_id'])) {
    $id = intval($_GET['delete_id']);
    if( $conn->deleteQuestionFromDB($id) === false ){
        $response = array ("error" => "Deletion error!");
    } else {
        $response = array ("success" => "Question deleted!");
    }
}

echo json_encode($response);

