<?php
session_start();
header("Content-Type: application/json");
include '../../db/db_conn.php';
include("../../libs/Smarty.class.php");
include("../../engine/ExamEngine.php");

$response = array();
if( isset($_SESSION['current_lecture_id'])) {
    if (isset($_GET['save'])) { 
        $engine = unserialize($_SESSION['engine']);
        unset($_SESSION['engine']);
        
        $quests = $engine->getTmpExam(null);
        $engine->saveAndReset(db_conn::getInstance());
        //
        // Punkte abfragen und spezielle Datei laden
        $noten = json_decode(file_get_contents('../../config_punkte_90.json'));

        $smarty = new Smarty;
        $smarty->assign("lecture", $_SESSION['current_lecture_bez']);
        $smarty->assign("questions", $engine->getTmpExam($_GET['question_order']));
        $smarty->left_delimiter = '<<';
        $smarty->right_delimiter = '>>';
        $smarty->assign("date", $_GET['datum']);
        $smarty->assign("laenge", intval($_GET['laenge']));
        $smarty->assign("noten", $noten);
        $smarty->assign("bereichspunkte", $engine->getBereichsPunkte());
        //
        // Erstellen der Klausur
        $exam = $smarty->fetch("../../vorlage/klausur.tpl");
        file_put_contents("../../tex/klausur.tex", $exam);
        //
        // Erstellen der Musterlösung
        $smarty->assign("prof", 1);
        $loesung = $smarty->fetch("../../vorlage/klausur.tpl");
        file_put_contents("../../tex/musterloesung/musterloesung.tex", $loesung);
        
        $smarty_new = new Smarty;
        $response = array('success' => $smarty_new->fetch("../../templates/exam_saved.tpl"));
    }  
} else {
    $response = array("error" => "Fehler beim Speichern/Erstellen der Klausur!");
}

echo json_encode($response);