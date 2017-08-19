<?php
session_start();
header("Content-Type: application/json");
include("../../libs/Smarty.class.php");

$response = array();
if (isset($_POST['save'])) {
    file_put_contents("../../vorlage/klausur.tpl", $_POST['save'], FILE_USE_INCLUDE_PATH);
    $response = array('success' => 'Vorlage gespeichert!');
} else {
    $vorlage = file_get_contents("../../vorlage/klausur.tpl");
    
    $smarty = new Smarty;
    $smarty->assign('vorlage', $vorlage);
    $response = array('data' => $smarty->fetch("../../templates/settings.tpl"));
}

echo json_encode($response);