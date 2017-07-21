<?php
include 'db/db_conn.php';
include("libs/Smarty.class.php");

$conn = db_conn::getInstance();
$lectures = $conn->getAllLectures();

$smarty = new Smarty;
$smarty->assign("lectures", $lectures);
$response = array('success' => $smarty->fetch("templates/lecture_navbar.tpl"));
echo $smarty->fetch("templates/lecture_navbar.tpl");
