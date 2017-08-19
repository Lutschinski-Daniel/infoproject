<?php
session_start();

include '../../db/db_conn.php';
include("../../libs/Smarty.class.php");

$id = $_GET['question']['current_question_id'];
$conn = db_conn::getInstance();
$params = array(
    "question-id" => $id,
    "frage-text" => substr($_GET['question']['frage-text'], 0, 4096),
    "antwort-text" => substr($_GET['question']['antwort-text'], 0, 4096),
    "difficulty" => $_GET['question']['difficulty'],
    "frequency" => $_GET['question']['frequency'],
    "points" => $_GET['question']['points'],
    "space-needed" => $_GET['question']['space-needed']
);
$conn->updateQuestionInDB($params);
$question = $conn->getQuestionWithId($id);

$smarty = new Smarty;
$smarty->assign("question", $question);
echo $smarty->fetch("../../templates/question_show_update.tpl");

