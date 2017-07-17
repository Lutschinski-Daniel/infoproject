<?php
session_start();
include("../../libs/Smarty.class.php");

header('Content-type: application/html');

$smarty = new Smarty;
if (isset($_SESSION['current_lecture_bez'])) {
    $smarty->assign("vorlesung", $_SESSION['current_lecture_bez']);
    $smarty->assign("anworten_default", 3);
    echo $smarty->fetch("../../templates/question_add_form.tpl");
} else {
    echo "<h1>Eine Vorlesung auswählen, um Fragen hinzufügen zu können!</h1>";
}
