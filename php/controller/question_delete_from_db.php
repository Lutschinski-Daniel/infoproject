<?php

include '../../db/db_conn.php';

$conn = db_conn::getInstance();

if (isset($_GET['delete_id'])) {
    $id = intval($_GET['delete_id']);
    $conn->deleteQuestionFromDB($id);
    echo 'Question deleted';
} else {
    echo 'Deletion error!';
}


