<?php

//include 'db_conn.php';

$database = include_once ( __DIR__ . '\..\config.php' );
//$db = mysqli_connect($database['host'], $database['user'], $database['pass'], '');
// Create connection
$db = new mysqli($database['host'], $database['user'], $database['pass'], '');
// Check connection
if ($db->connect_error) {
    die("Connection failed: " . $db->connect_error);
} else {
    $query = "CREATE DATABASE IF NOT EXISTS " . $database['name'];
    if ($db->query($query) !== TRUE) {
        echo "Database not created. " . $db->error;
    }

    $query = "CREATE TABLE IF NOT EXISTS " . $database['name'] . ".Questions (
                    id int(5) NOT NULL AUTO_INCREMENT,
                    lecture_id tinyint(3) NOT NULL,
                    type tinyint(1) DEFAULT NULL,
                    text varchar(128) DEFAULT NULL,
                    answer varchar(1024) DEFAULT NULL,
                    difficulty tinyint(2) DEFAULT 3,
                    frequency tinyint(2) DEFAULT 3,
                    points INT DEFAULT 1,
                    space tinyint(2) DEFAULT 1,
                    created varchar(16) DEFAULT NULL,
                    last_usage varchar(16) DEFAULT NULL,
                    PRIMARY KEY(id)
                );";
    if ($db->query($query) !== TRUE) {
        echo "Table Questions not created. " . $db->error;
    }

    $query = "CREATE TABLE IF NOT EXISTS " . $database['name'] . ".Lectures (
                    id tinyint(3) NOT NULL AUTO_INCREMENT,
                    bezeichnung varchar(128) DEFAULT NULL,
                    bezeichnung_kurz varchar (6) DEFAULT NULL,
                    created varchar(16) DEFAULT NULL,
                    PRIMARY KEY(id)
                );";
    if ($db->query($query) !== TRUE) {
        echo "Table Lectures not created. " . $db->error;
    }
}

