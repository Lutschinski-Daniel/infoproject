<?php
session_start();
include("../../libs/Smarty.class.php");
include '../../db/db_conn.php';

header('Content-type: application/html');

$smarty = new Smarty;
if (isset($_SESSION['current_lecture_bez'])) {
    $smarty->assign("vorlesung", $_SESSION['current_lecture_bez']);
    $smarty->assign("Global", $GLOBALS);
    $smarty->assign("anworten_default", 5);
    echo $smarty->fetch("../../templates/question_add_form.tpl");
} else {
    echo "<h1>Eine Vorlesung auswählen, um Fragen hinzufügen zu können!</h1>";
}
