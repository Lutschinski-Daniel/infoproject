<?php

include("../../libs/Smarty.class.php");
include '../../db/db_conn.php';

header('Content-type: application/html');

$smarty = new Smarty;
if (isset($GLOBALS['current_lecture'])) {
    $smarty->assign("vorlesung", "gesetzt");
} else {
    $smarty->assign("vorlesung", "ungesetzt");
}
$smarty->assign("Global", $GLOBALS);
$smarty->assign("anworten_default", 5);

echo $smarty->fetch("../../templates/question_add_form.tpl");