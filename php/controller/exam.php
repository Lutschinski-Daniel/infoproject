<?php
session_start();
header("Content-Type: application/json");
include '../../db/db_conn.php';
include("../../libs/Smarty.class.php");
include("../../engine/ExamEngine.php");

$response = array();

if( isset($_SESSION['current_lecture_id'])) {
    $smarty = new Smarty;
    $smarty->assign("lecture", $_SESSION['current_lecture_bez']);
    
    if (isset ($_GET['save'])) { 
        $engine = unserialize($_SESSION['engine']);
        $quests = $engine->getTmpExam();
        $engine->saveAndReset(db_conn::getInstance());
        unset($_SESSION['engine']);
        // 
        // SAVE QUESTIONS FOR EXAM HERE!
        // $smarty->assign('questions', $questions);
        $smarty->assign("questions", $quests);
        $smarty->left_delimiter = '<<';
        $smarty->right_delimiter = '>>';
        $smarty->assign("date", $_GET['datum']);
        $smarty->assign("laenge", $_GET['laenge']);
        $result = $smarty->fetch("../../vorlage/klausur1.tpl");
        file_put_contents("../../tex/klausur1.tex", $result);
        $response = array('success' => 'Klausur wurde erstellt!');
    } elseif( isset($_GET['laenge'], $_GET['punkte'], $_GET['datum'])){
        $smarty->assign('laenge', $_GET['laenge']);
        $smarty->assign('punkte', $_GET['punkte']);
        $smarty->assign('datum', $_GET['datum']);
        // 
        // LOAD QUESTIONS FOR EXAM-VORSCHLAG HERE!
        // $smarty->assign('questions', $questions);
        $engine = new ExamEngine($_SESSION['current_lecture_id'], $_GET['punkte'], db_conn::getInstance());
        $smarty->assign('questions', $engine->getTmpExam());
        $smarty->assign('exam_points', $engine->getPoints());
        $smarty->assign('exam_average', $engine->getAverage());
        $_SESSION['engine'] = serialize($engine);
        $response = array('success' => $smarty->fetch("../../templates/exam.tpl"));
    } else {
        $smarty->assign('laenge', "");
        $smarty->assign('punkte', 100);
        $smarty->assign('datum', date('d.m.Y'));
        $smarty->assign('questions', "");
        $response = array('success' => $smarty->fetch("../../templates/exam.tpl"));
    }
} else {
    $response = array("error" => "<h1>Wähle eine Vorlesung, um eine Klausur zu erstellen!</h1>");
}

echo json_encode($response);