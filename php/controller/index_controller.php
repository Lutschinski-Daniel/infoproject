<?php
session_start();
unset($_SESSION['current_lecture_bez']);

$data = "<h1>Welcome to creXam!</h1>";
header('Content-type: application/html');
echo $data;