<?php
include '../../db/db_conn.php';

$conn = db_conn::getInstance();
$params = array(
    "bezeichnung" => $_GET['bezeichnung'],
    "bezeichnung_kurz" => $_GET['bezeichnung_kurz'],
);
$conn->saveLectureToDB($params);

$conn = db_conn::getInstance();
$query = "SELECT * FROM `lectures` WHERE bezeichnung_kurz='" . $_GET['bezeichnung_kurz'] . "'";
$lecture = mysqli_fetch_assoc($conn->set($query));

if ($lecture != NULL)
    echo '<li class="lecture"><a href="#" id="' . $lecture['id'] . '" >'
                    . $lecture['bezeichnung_kurz'] . '</a></li>';
else
    echo "Probably not worked!";