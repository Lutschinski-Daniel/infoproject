<?php
include("../libs/Smarty.class.php");
$smarty = new Smarty;
$smarty->assign("name", "Sam");

echo $smarty->fetch("../templates/welcome.tpl");