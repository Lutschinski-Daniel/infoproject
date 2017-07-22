<?php
session_start();
header("Content-Type: application/json");
include '../../db/db_conn.php';
include("../../libs/Smarty.class.php");

$response = array();
if( isset($_SESSION['current_lecture_id'])) {
    $smarty = new Smarty;
    $smarty->assign("lecture", $_SESSION['current_lecture_bez']);
    $smarty->assign("today", date('Y-m-d'));
    $response = array('success' => $smarty->fetch("../../templates/exam.tpl"));
} else {
    $response = array("error" => "<h1>Wähle eine Vorlesung, um eine Klausur zu erstellen!</h1>");
}

echo json_encode($response);