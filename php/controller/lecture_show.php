<?php
session_start();
header("Content-Type: application/json");
include '../../db/db_conn.php';
include("../../libs/Smarty.class.php");

$response = array();
if (isset($_GET['lecture_id'])) {
    $id = intval($_GET["lecture_id"]);
    $conn = db_conn::getInstance();
    $lecture = $conn->getLectureWithId($id);
    $anzahl_fragen = $conn->getQuestionCountForLec($id);

    if ($lecture == NULL) {
        $response = array("error" => "Fehler beim Laden der Vorlesung!");
    } else {
        $_SESSION['current_lecture_id'] = $lecture->id;
        $_SESSION['current_lecture_bez'] = $lecture->bezeichnung;
        $smarty = new Smarty;
        $smarty->assign("lecture", $lecture);
        $smarty->assign("anz_fragen", $anzahl_fragen);
        $response = array("success" => $smarty->fetch("../../templates/lecture_show.tpl"));
    }
} else {
    $response = array("error" => "<h1>Wähle eine Vorlesung, um eine Klausur zu erstellen!</h1>");
}

echo json_encode($response);




