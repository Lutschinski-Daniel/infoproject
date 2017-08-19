<?php
session_start();
header("Content-Type: application/json");
include("../../libs/Smarty.class.php");
include("../../engine/ExamEngine.php");

$response = array();
if( isset($_SESSION['current_lecture_id'])) {
    if(isset($_GET['swap'])){
        $id_curr = intval($_GET['curr_quest']);
        $id_wanted = intval($_GET['wanted_quest']);
        $order = $_GET['question_order'];
        
        $engine = unserialize($_SESSION['engine']);
        $engine->switchQuestionWith($id_curr, $id_wanted);
        
        $smarty = new Smarty;
        $smarty->assign('questions', $engine->getTmpExam($order));
        $smarty->assign('exam_points', $engine->getPoints());
        $smarty->assign('exam_average', $engine->getAverage());
        $response = array('success' => $smarty->fetch("../../templates/exam_questions.tpl"));
        $_SESSION['engine'] = serialize($engine);
    }
} else {
    $response = array('error' => "Fehler beim tauschen der Klausuraufgaben");
}

echo json_encode($response);