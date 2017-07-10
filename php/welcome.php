<?php
include("../libs/Smarty.class.php");
$smarty = new Smarty;

echo $smarty->fetch("../templates/welcome.tpl");