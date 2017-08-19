<?php
session_start();
header("Content-Type: application/json");
include("../../libs/Smarty.class.php");
include("../../engine/ExamEngine.php");

$response = array();
if(isset($_SESSION['current_lecture_id'])) {
    if(isset($_GET['switch'])){ 
        $id = intval($_GET['switch']);
        $engine = unserialize($_SESSION['engine']);
        
        $smarty = new Smarty;
        $smarty->assign('quests', $engine->getQuestionsToSwitch($id));
        $response = array('success' => $smarty->fetch("../../templates/exam_switch.tpl"));
        $_SESSION['engine'] = serialize($engine);
    } 
} else {
    $response = array('error' => "Fehler beim anzeigen von Tausch-Aufgaben.");
}

echo json_encode($response);