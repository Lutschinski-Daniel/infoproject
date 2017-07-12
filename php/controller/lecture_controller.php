<?php

include("../../libs/Smarty.class.php");
header('Content-type: application/html');

$smarty = new Smarty;
echo $smarty->fetch("../../templates/lecture_add.tpl");