<?php
include '../../db/db_conn.php';

$conn = db_conn::getInstance();
$params = array(
    "bezeichnung" => $_GET['bezeichnung'],
    "bezeichnung_kurz" => $_GET['bezeichnung_kurz'],
);
$conn->saveLectureToDB($params);

echo "Probably worked!";