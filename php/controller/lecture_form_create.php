<?php
session_start();
include("../../libs/Smarty.class.php");

if( isset($_SESSION['current_lecture_id'])) {
    unset($_SESSION['current_lecture_id']);
    unset($_SESSION['current_lecture_bez']);
}

$smarty = new Smarty;
echo $smarty->fetch("../../templates/lecture_add_form.tpl");
