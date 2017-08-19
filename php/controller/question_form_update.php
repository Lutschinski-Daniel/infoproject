<?php
include '../../db/db_conn.php';
include("../../libs/Smarty.class.php");

if(isset($_GET['update_id'])) {
    $id = intval($_GET['update_id']);
    $conn = db_conn::getInstance();
    $question = $conn->getQuestionWithId($id);
    
    $smarty = new Smarty;
    $smarty->assign("question", $question);
    echo $smarty->fetch("../../templates/question_form_update.tpl");
    
} else {
    echo "<h1>Fehler</h1>";
}