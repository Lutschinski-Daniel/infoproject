<?php

class db_conn {

    private $host;
    private $user;
    private $pass;
    private $name;
    private static $instance;
    private $connection;
    private $config = null;

    private function __construct() {

        $json = json_decode(file_get_contents(__DIR__ . '\..\config.json'));
        $this->config = $json;
        $this->host = $this->config->{'host'};
        $this->user = $this->config->{'user'};
        $this->name = $this->config->{'name'};
        $this->pass = $this->config->{'pass'};
        
        $this->connection = new mysqli($this->host, $this->user, $this->pass, $this->name);
        $this->createDatabaseIfNotExistent();
    }

    static function getInstance() {
        if (!self::$instance) {
            self::$instance = new self();
        }
        return self::$instance;
    }

    public function getAllLectures() {
        return mysqli_query($this->connection, "SELECT * FROM lectures");
    }

    public function getLectureWithId($id) {
        $stmt = $this->connection->prepare("SELECT * FROM `lectures` WHERE id=?");
        $stmt->bind_param("i", $id);
        $stmt->execute();

        $result = $stmt->get_result();
        return $result->fetch_assoc();
    }

    public function getLectureWithKurzBez($kurzBez) {
        $stmt = $this->connection->prepare("SELECT * FROM `lectures` WHERE bezeichnung_kurz=?");
        $stmt->bind_param("s", $kurzBez);
        $stmt->execute();

        $result = $stmt->get_result();
        return $result->fetch_assoc();
    }

    public function getAllQuestions4Lec($id) {
        $stmt = $this->connection->prepare("SELECT * FROM `questions` WHERE lecture_id=?");
        $stmt->bind_param("i", $id);
        $stmt->execute();

        $allQuests = array();
        $result = $stmt->get_result();
        while ($question = $result->fetch_assoc()) {
            $allQuests[] = $question;
        }
        return $allQuests;
    }

    public function getQuestionWithId($id) {
        $stmt = $this->connection->prepare("SELECT * FROM `questions` WHERE id=?");
        $stmt->bind_param("i", $id);
        $stmt->execute();

        $result = $stmt->get_result();
        return $result->fetch_assoc();
    }

    public function getQuestionCountForLec($id) {
        $stmt = $this->connection->prepare("SELECT COUNT(*) AS anzahl FROM `questions` WHERE lecture_id=?");
        $stmt->bind_param("i", $id);
        $stmt->execute();
        $row = $stmt->get_result();
        $count = $row->fetch_assoc();
        return intval($count['anzahl']);
    }
    
    public function getArrayWithFreq($id, $freq){
        $stmt = $this->connection->prepare("SELECT * FROM `questions` WHERE lecture_id=? "
                . "AND frequency=? ORDER BY last_usage DESC");
        $stmt->bind_param("ii", 
                $id, 
                $freq
        );
        $stmt->execute();

        $quests = array();
        $result = $stmt->get_result();
        while ($question = $result->fetch_assoc()) {
            $quests[] = $question;
        }
        return $quests;
    }

    public function deleteQuestionFromDB($id) {
        $stmt = $this->connection->prepare("DELETE FROM `questions` WHERE id=?");
        $stmt->bind_param("i", $id);

        return $stmt->execute();
    }

    public function updateQuestionInDB($params) {
        $stmt = $this->connection->prepare(
                "UPDATE `questions` SET `text`=?, `answer`=?,`difficulty`=?,`frequency`=?,"
                . "`points`=?,`space`=? WHERE id=?");
        $stmt->bind_param("ssiiiii", 
                $params{'frage-text'}, 
                $params{'antwort-text'}, 
                $params{'difficulty'}, 
                $params{'frequency'}, 
                $params{'points'}, 
                $params{'space-needed'}, 
                $params{'question-id'}
        );
        $stmt->execute();
    }

    public function saveQuestion2DB($params) {
        $stmt = $this->connection->prepare(
                "INSERT INTO `questions`(`id`, `lecture_id`, `type`, `text`, `answer`, "
                . "`difficulty`, `frequency`, `points` ,`space`, `created`, `last_usage`) "
                . "VALUES (?,?,?,?,?,?,?,?,?,?,?)");
        $id = 0;
        $dateCre = date('d.m.Y');
        $dateLastUsed = "never";
        $stmt->bind_param("iiissiiiiss", 
                $id, 
                $params{'lecture-id'}, 
                $params{'frage-typ'}, 
                $params{'frage-text'}, 
                $params{'antwort-text'}, 
                $params{'difficulty'}, 
                $params{'frequency'}, 
                $params{'points'}, 
                $params{'space-needed'}, 
                $dateCre, $dateLastUsed
        );
        return $stmt->execute();
    }

    public function saveLecture2DB($params) {
        $stmt = $this->connection->prepare(
                "INSERT INTO `lectures`(`id`, `bezeichnung`, `bezeichnung_kurz`, `created`) "
                . "VALUES (?,?,?,?)");
        $id = 0;
        $dateCre = date('d.m.Y');
        $stmt->bind_param("isss", 
                $id, 
                $params['bezeichnung'], 
                $params['bezeichnung_kurz'], 
                $dateCre
        );
        $stmt->execute();
    }

    private function createDatabaseIfNotExistent() {
        $query = "CREATE DATABASE IF NOT EXISTS " . $this->name;
        if ($this->connection->query($query) !== TRUE) {
            echo "Database not created. " . $this->connection->error;
        }

        $query = "CREATE TABLE IF NOT EXISTS " . $this->name . ".Questions (
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
        if ($this->connection->query($query) !== TRUE) {
            echo "Table Questions not created. " . $this->connection->error;
        }

        $query = "CREATE TABLE IF NOT EXISTS " . $this->name . ".Lectures (
                    id tinyint(3) NOT NULL AUTO_INCREMENT,
                    bezeichnung varchar(128) DEFAULT NULL,
                    bezeichnung_kurz varchar (6) DEFAULT NULL,
                    created varchar(16) DEFAULT NULL,
                    PRIMARY KEY(id)
                );";
        if ($this->connection->query($query) !== TRUE) {
            echo "Table Lectures not created. " . $this->connection->error;
        }
    }
}
