<?php
session_start();

$filename = 'loesung_' . date('d.m');
if( isset($_SESSION['current_lecture_id'])) {
    $filename = 'loesung_' . $_SESSION['current_lecture_bez'] . '_' . date('d.m') . '.tex';
} 

header("Content-Type: application/text");
header("Content-Length: " . filesize("../../tex/musterloesung/musterloesung.tex"));
header("Content-disposition: attachment; filename=" . $filename);
readfile("../../tex/musterloesung/musterloesung.tex");
