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
        $engine->updateOrder($order);
        $quest = $engine->switchQuestionWith($id_curr, $id_wanted);
        $smarty = new Smarty;
        $smarty->assign('questions', $engine->getTmpExam());
        $smarty->assign('exam_points', $engine->getPoints());
        $smarty->assign('exam_average', $engine->getAverage());
        $response = array('success' => $smarty->fetch("../../templates/exam_update.tpl"));
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
        $quests = $engine->getTmpExam();
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