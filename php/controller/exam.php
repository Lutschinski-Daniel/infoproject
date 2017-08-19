<?php
session_start();
header("Content-Type: application/json");
include("../../libs/Smarty.class.php");

$response = array();
if (isset($_SESSION['current_lecture_id'])) {
    if (isset($_SESSION['engine'])) {
        unset($_SESSION['engine']);
    }

    $smarty = new Smarty;
    $smarty->assign("lecture", $_SESSION['current_lecture_bez']);
    $smarty->assign('laenge', "");
    $smarty->assign('punkte', 100);
    $smarty->assign('datum', date('d.m.Y'));
    $response = array('success' => $smarty->fetch("../../templates/exam.tpl"));
} else {
    $response = array("error" => "<h1>Wähle eine Vorlesung, um eine Klausur zu erstellen!</h1>");
}

echo json_encode($response);
