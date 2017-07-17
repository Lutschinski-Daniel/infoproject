<?php
session_start();
include '../../db/db_conn.php';

$conn = db_conn::getInstance();
$params = array(
    "bezeichnung" => $_GET['bezeichnung'],
    "bezeichnung_kurz" => $_GET['bezeichnung_kurz'],
);
$conn->saveLecture2DB($params);

$conn = db_conn::getInstance();
$lecture = $conn->getLectureWithKurzBez($_GET['bezeichnung_kurz']);

unset($_SESSION['current_lecture_bez']);

if ($lecture != NULL)
    echo '<li class="lecture"><a href="#" id="' . $lecture['id'] . '" >'
                    . $lecture['bezeichnung_kurz'] . '</a></li>';
else
    echo "Probably not worked!";