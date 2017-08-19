<?php
session_start();
header("Content-Type: application/json");
include("../../libs/Smarty.class.php");
include("../../engine/ExamEngine.php");

$response = array();
if (isset($_SESSION['current_lecture_id'])) {
    if (isset($_GET['delete'])) {
        $engine = unserialize($_SESSION['engine']);
        $engine->deleteFromTmpExam(intval($_GET['delete']));

        $smarty = new Smarty;
        $smarty->assign("lecture", $_SESSION['current_lecture_bez']);
        $smarty->assign('questions', $engine->getTmpExam($_GET['order']));
        $smarty->assign('exam_points', $engine->getPoints());
        $smarty->assign('exam_average', $engine->getAverage());
       
        $response = array('success' => $smarty->fetch("../../templates/exam_questions.tpl"));
        $_SESSION['engine'] = serialize($engine);
    }
} else {
    $response = array('error' => "Fehler beim Löschen der Aufgabe");
}

echo json_encode($response);
