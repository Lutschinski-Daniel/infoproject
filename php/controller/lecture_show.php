<?php
session_start();
include '../../db/db_conn.php';
include("../../libs/Smarty.class.php");

header('Content-type: application/html');

$id = $_GET["lecture_id"];

$conn = db_conn::getInstance();
$lecture = $conn->getLectureWithId($id);
$anzahl_fragen = $conn->getQuestionCountForLec($id);

$obj = json_decode('{"peter" : "Pan"}');

if ($lecture == NULL)
    echo "Fehler beim Laden der Vorlesung!";
else {
    $_SESSION['current_lecture_id'] = $lecture["id"];
    $_SESSION['current_lecture_bez'] = $lecture["bezeichnung"];
    $smarty = new Smarty;
    $smarty->assign("bez", $lecture["bezeichnung"]);
    $smarty->assign("bez_kurz", $lecture["bezeichnung_kurz"]);
    $smarty->assign("anz_fragen", $anzahl_fragen);
    $smarty->assign("obj", $obj);
    echo $smarty->fetch("../../templates/lecture_show.tpl");
}
