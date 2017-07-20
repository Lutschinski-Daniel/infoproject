<?php
session_start();
include '../../db/db_conn.php';

if( isset($_SESSION['current_lecture_id'])) {
    unset($_SESSION['current_lecture_id']);
    unset($_SESSION['current_lecture_bez']);
}

$conn = db_conn::getInstance();
$params = array(
    "bezeichnung" => $_GET['bezeichnung'],
    "bezeichnung_kurz" => $_GET['bezeichnung_kurz'],
);
$conn->saveLecture2DB($params);

$conn = db_conn::getInstance();
$lecture = $conn->getLectureWithKurzBez($_GET['bezeichnung_kurz']);

if ($lecture != NULL)
    echo '<li class="lecture"><a href="#" id="' . $lecture['id'] . '" >'
                    . $lecture['bezeichnung_kurz'] . '</a></li>';
else
    echo "Probably not worked!";