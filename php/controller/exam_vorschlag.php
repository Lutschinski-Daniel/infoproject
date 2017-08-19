<?php
session_start();
header("Content-Type: application/json");
include '../../db/db_conn.php';
include("../../libs/Smarty.class.php");
include("../../engine/ExamEngine.php");

$response = array();
if (isset($_SESSION['current_lecture_id'])) {
    if (isset($_GET['vorschlag'])) {
        if (isset($_SESSION['engine'])) {
            unset($_SESSION['engine']);
        }
        $punkte = intval($_GET['punkte']);
        $engine = new ExamEngine(
                intval($_SESSION['current_lecture_id']), $punkte, db_conn::getInstance()
        );
        if ($engine->examCreationPossible()) {
            $quests = $engine->getTmpExam(null);

            $smarty = new Smarty;
            $smarty->assign("lecture", $_SESSION['current_lecture_bez']);
            $smarty->assign('laenge', intval($_GET['laenge']));
            $smarty->assign('punkte', $punkte);
            $smarty->assign('datum', $_GET['datum']);
            $smarty->assign('questions', $quests);
            $smarty->assign('exam_points', $engine->getPoints());
            $smarty->assign('exam_average', $engine->getAverage());
            $_SESSION['engine'] = serialize($engine);
            $response = array('success' => $smarty->fetch("../../templates/exam.tpl"));
        } else {
            $response = array("error" => "<h1>Minimale Aufgabenanzahl nicht erreicht, um Vorschlag zu erstellen!</h1>");
        }
    }
} else {
    $response = array("error" => "<h1>Wähle eine Vorlesung, um eine Klausur zu erstellen!</h1>");
}

echo json_encode($response);
