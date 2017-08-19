<?php
session_start();
include '../../db/db_conn.php';
include("../../libs/Smarty.class.php");
header('Content-type: application/json');

if( isset($_SESSION['current_lecture_id'])) {
    unset($_SESSION['current_lecture_id']);
    unset($_SESSION['current_lecture_bez']);
}

$conn = db_conn::getInstance();
$params = array(
    "bezeichnung" => substr($_GET['bezeichnung'], 0, 128),
    "bezeichnung_kurz" => substr($_GET['bezeichnung_kurz'], 0, 8),
);
$conn->saveLecture2DB($params);
$lecture = $conn->getLectureWithKurzBez($params['bezeichnung_kurz']);
    
$response = array();
if ($lecture != NULL) {
    $smarty = new Smarty;
    $smarty->assign("lecture", $lecture);
    $data = $smarty->fetch("../../templates/lecture_li.tpl");
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