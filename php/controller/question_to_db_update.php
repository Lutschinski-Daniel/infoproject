<?php
session_start();
include '../../db/db_conn.php';
include("../../libs/Smarty.class.php");

if (isset($_POST['question']['current_question_id'])) {
    $id = $_POST['question']['current_question_id'];
    $conn = db_conn::getInstance();
    $params = array(
        "question-id" => $id,
        "frage-text" => substr($_POST['question']['frage-text'], 0, 4095),
        "antwort-text" => substr($_POST['question']['antwort-text'], 0, 4095),
        "difficulty" => $_POST['question']['difficulty'],
        "frequency" => $_POST['question']['frequency'],
        "points" => $_POST['question']['points'],
        "space-needed" => $_POST['question']['space-needed']
    );
    $conn->updateQuestionInDB($params);
    $question = $conn->getQuestionWithId($id);

    $smarty = new Smarty;
    $smarty->assign("question", $question);
    echo $smarty->fetch("../../templates/question_show_update.tpl");
}
