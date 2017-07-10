<?php

$database = include_once ( __DIR__ . '\..\config.php' );
//$db = mysqli_connect($database['host'], $database['user'], $database['pass'], '');
// Create connection
$db = new mysqli($database['host'], $database['user'], $database['pass'], '');
// Check connection
if ($db->connect_error) {
    die("Connection failed: " . $db->connect_error);
} else {
    $query = "CREATE DATABASE IF NOT EXISTS " . $database['name'];
    if ($db->query($query) === TRUE) {
        echo "Database created!";
    } else {
        echo "Database not created. " . $db->error;
    }

    $query =    "CREATE TABLE IF NOT EXISTS " .$database['name']. ".Questions (
                    id int(5) NOT NULL AUTO_INCREMENT,
                    type int(1) DEFAULT NULL,
                    created DATE DEFAULT NULL,
                    last_usage DATE DEFAULT NULL,
                    text varchar(128) DEFAULT NULL,
                    answer varchar(255) DEFAULT NULL,
                    PRIMARY KEY(id)
                );";
    if ($db->query($query) === TRUE) {
        echo "Table created!";
    } else {
        echo "Table not created. " . $db->error;
    }
}

mysqli_close($db);

