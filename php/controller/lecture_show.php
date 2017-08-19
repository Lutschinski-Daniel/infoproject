<?php
session_start();
include '../../db/db_conn.php';
include("../../libs/Smarty.class.php");

$id = $_GET["lecture_id"];

$conn = db_conn::getInstance();
$lecture = $conn->getLectureWithId($id);
$anzahl_fragen = $conn->getQuestionCountForLec($id);

if ($lecture == NULL)
    echo "Fehler beim Laden der Vorlesung!";
else {
    $_SESSION['current_lecture_id'] = $lecture->id;
    $_SESSION['current_lecture_bez'] = $lecture->bezeichnung;
    $smarty = new Smarty;
    $smarty->assign("lecture", $lecture);
    $smarty->assign("anz_fragen", $anzahl_fragen);
    echo $smarty->fetch("../../templates/lecture_show.tpl");
}
