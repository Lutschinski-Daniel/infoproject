<?php
session_start();
header("Content-Type: application/json");
include '../../db/db_conn.php';
include("../../libs/Smarty.class.php");

$response = array();
$questions_test = array ("Wieso weinst du?", "Warum die Banane krumm?", "Best baller?", "Favourite ICE?");
$today = date('d.m.Y');

if( isset($_SESSION['current_lecture_id'])) {
    $smarty = new Smarty;
    $smarty->assign("lecture", $_SESSION['current_lecture_bez']);
    
    if( isset($_GET['laenge'], $_GET['punkte'], $_GET['datum'])){
        $smarty->assign('laenge', $_GET['laenge']);
        $smarty->assign('punkte', $_GET['punkte']);
        $smarty->assign('datum', $_GET['datum']);
        // 
        // LOAD QUESTIONS FOR EXAM-VORSCHLAG HIER!
        // $smarty->assign('questions', $questions);
        $smarty->assign('questions', $questions_test);
        $response = array('success' => $smarty->fetch("../../templates/exam.tpl"));
    } else {
        $smarty->assign('laenge', "");
        $smarty->assign('punkte', 100);
        $smarty->assign('datum', $today);
        $smarty->assign('questions', "");
        $response = array('success' => $smarty->fetch("../../templates/exam.tpl"));
    }
} else {
    $response = array("error" => "<h1>Wähle eine Vorlesung, um eine Klausur zu erstellen!</h1>");
}

echo json_encode($response);