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

    if(isset($_GET['point_update'])){
        $engine = unserialize($_SESSION['engine']);
        $engine->updatePointsForId(intval($_GET['point_update']),intval($_GET['id']));
        $response = array('success' => 'Aufgabenpunkte für diese Klausur aktualisiert');
        $_SESSION['engine'] = serialize($engine);
    } elseif(isset($_GET['delete'])){
        $engine = unserialize($_SESSION['engine']);
        $engine->deleteFromTmpExam(intval($_GET['delete']));
        $smarty->assign('questions', $engine->getTmpExam($_GET['order']));
        $smarty->assign('exam_points', $engine->getPoints());
        $smarty->assign('exam_average', $engine->getAverage());
        $response = array('success' => $smarty->fetch("../../templates/exam_questions.tpl"));
        $_SESSION['engine'] = serialize($engine);
    } elseif (isset($_GET['save'])) { 
        $engine = unserialize($_SESSION['engine']);
        $quests = $engine->getTmpExam(null);
        $engine->saveAndReset(db_conn::getInstance());
        unset($_SESSION['engine']);
        $smarty->assign("questions", $engine->getTmpExam($_GET['question_order']));
        $smarty->left_delimiter = '<<';
        $smarty->right_delimiter = '>>';
        $smarty->assign("date", $_GET['datum']);
        $smarty->assign("laenge", $_GET['laenge']);
        $noten = json_decode(file_get_contents('../../config_punkte_90.json'));
        $smarty->assign("noten", $noten);
        $smarty->assign("bereichspunkte", $engine->getBereichsPunkte());
        $exam = $smarty->fetch("../../vorlage/klausur1.tpl");
        file_put_contents("../../tex/klausur1.tex", $exam);
        $smarty->assign("prof", 1);
        $loesung = $smarty->fetch("../../vorlage/klausur1.tpl");
        file_put_contents("../../tex/musterloesung/musterloesung.tex", $loesung);
        $response = array('success' => '<h2>Klausur wurde erstellt! Sie finden sie <br> unter: ***</h2>');
    } elseif(isset($_GET['switch'])){ 
        $id = intval($_GET['switch']);
        $engine = unserialize($_SESSION['engine']);
        $smarty = new Smarty;
        $smarty->assign('quests', $engine->getQuestionsToSwitch($id));
        $response = array('switch' => $smarty->fetch("../../templates/exam_switch.tpl"));
        $_SESSION['engine'] = serialize($engine);
    } elseif(isset($_GET['swap'])){
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
    } elseif( isset($_GET['laenge'], $_GET['punkte'], $_GET['datum'])){
        if( isset($_SESSION['engine'])){
            unset($_SESSION['engine']);
        }
        $smarty->assign('laenge', $_GET['laenge']);
        $smarty->assign('punkte', $_GET['punkte']);
        $smarty->assign('datum', $_GET['datum']);
        // 
        // LOAD QUESTIONS FOR EXAM-VORSCHLAG HERE!
        // $smarty->assign('questions', $questions);
        $engine = new ExamEngine($_SESSION['current_lecture_id'], $_GET['punkte'], db_conn::getInstance());
        $quests = $engine->getTmpExam(null);
        $smarty->assign('questions', $quests);
        $smarty->assign('exam_points', $engine->getPoints());
        $smarty->assign('exam_average', $engine->getAverage());
        $_SESSION['engine'] = serialize($engine);
        $response = array('success' => $smarty->fetch("../../templates/exam.tpl"));
    } else {
        if( isset($_SESSION['engine'])){
            unset($_SESSION['engine']);
        }
        $smarty->assign('laenge', "");
        $smarty->assign('punkte', 100);
        $smarty->assign('datum', date('d.m.Y'));
        $response = array('success' => $smarty->fetch("../../templates/exam.tpl"));
    }
} else {
    $response = array("error" => "<h1>Wähle eine Vorlesung, um eine Klausur zu erstellen!</h1>");
}

echo json_encode($response);