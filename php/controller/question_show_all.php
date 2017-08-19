<?php
session_start();
include("../../libs/Smarty.class.php");
include '../../db/db_conn.php';

if (isset($_SESSION['current_lecture_bez'])) {
    $conn = db_conn::getInstance();
    $questions = $conn->getAllQuestions4Lec($_SESSION['current_lecture_id']);

    $difficulty = 0;
    foreach($questions as $question){
        $difficulty += $question->difficulty;
    }
    $average = 0;
    if(count($questions) > 0){
        $average = number_format($difficulty/count($questions), 2);
    }
    $anz_MC = 0;
    $anz_WI = 0;
    $anz_TR = 0;
    foreach($questions as $quest){
        if($quest->type == 0){
            $anz_MC++;
        }elseif ($quest->type == 1) {
            $anz_WI++;
        }else{
            $anz_TR++;
        }
    }
    $smarty = new Smarty;
    $smarty->assign("questions", $questions);
    $smarty->assign("average", $average);
    $smarty->assign("anz_MC", $anz_MC);
    $smarty->assign("anz_WI", $anz_WI);
    $smarty->assign("anz_TR", $anz_TR);
    $smarty->assign("quest_count", count($questions));
    $smarty->assign("lecture_bez", $_SESSION['current_lecture_bez']);
    echo $smarty->fetch("../../templates/question_show_all.tpl");
} else {
    echo "<h1>Eine Vorlesung auswählen, um alle Fragen anzuzeigen!</h1>";
}
