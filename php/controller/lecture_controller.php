<?php
session_start();

include("../../libs/Smarty.class.php");
unset($_SESSION['current_lecture_bez']);

header('Content-type: application/html');

$smarty = new Smarty;
echo $smarty->fetch("../../templates/lecture_add_form.tpl");
