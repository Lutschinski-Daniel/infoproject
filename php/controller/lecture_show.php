<?php
session_start();
include '../../db/db_conn.php';
include("../../libs/Smarty.class.php");

header('Content-type: application/html');

$id = $_GET["lecture_id"];
$GLOBALS['current_lecture'] = $id;

$conn = db_conn::getInstance();
$query = "SELECT * FROM `lectures` WHERE id=" . $id . "";
$lecture = mysqli_fetch_assoc($conn->set($query));

if ($lecture == NULL)
    echo "Fehler beim Laden der Vorlesung!";
else {
    $_SESSION['current_lecture_id'] = $lecture["id"];
    $_SESSION['current_lecture_bez'] = $lecture["bezeichnung"];
    $smarty = new Smarty;
    $smarty->assign("bez", $lecture["bezeichnung"]);
    $smarty->assign("bez_kurz", $lecture["bezeichnung_kurz"]);
    $smarty->assign("anz_fragen", 5);
    echo $smarty->fetch("../../templates/lecture_show.tpl");
}
