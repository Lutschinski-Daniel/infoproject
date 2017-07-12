<?php
include '../../db/db_conn.php';

$conn = db_conn::getInstance();
$query = "INSERT INTO `lectures`(`id`, `bezeichnung`, `bezeichnung_kurz`) "
        . "VALUES (0, '" . $_GET["bezeichnung"] . "', '" . $_GET["bezeichnung_kurz"] . "')";
$success = $conn->set($query);

if($success === TRUE )
    $data = '<h1>Vorlesung erstellt!</h1>';
else {
     $data = '<h1>Vorlesung nicht erstellt!</h1>';
}
header('Content-type: application/html');
echo $data;

