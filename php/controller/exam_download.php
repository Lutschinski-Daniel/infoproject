<?php
session_start();

$filename = 'Klausur_' . date('d.m');
if( isset($_SESSION['current_lecture_id'])) {
    $filename = 'Klausur_' . $_SESSION['current_lecture_bez'] . '_' . date('d.m') . '.tex';
} 

header("Content-Type: application/text");
header("Content-Length: " . filesize("../../tex/klausur.tex"));
header("Content-disposition: attachment; filename=" . $filename);
readfile("../../tex/klausur.tex");

