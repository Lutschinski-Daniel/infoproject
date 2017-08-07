<?php

class Question {
    
    private $id;
    private $lecture_id;
    private $type;
    private $text;
    private $answer;
    private $difficulty;
    private $frequency;
    private $points;
    private $space;
    private $date_created;
    private $date_last_used;

    function __construct($id, $lecture_id, $type, $text, $answer, $difficulty, $frequency, $points, $space, $date_created, $date_last_used) {
        $this->id = $id;
        $this->lecture_id = $lecture_id;
        $this->type = $type;
        $this->text = $text;
        $this->answer = $answer;
        $this->difficulty = $difficulty;
        $this->frequency = $frequency;
        $this->points = $points;
        $this->space = $space;
        $this->date_created = $date_created;
        $this->date_last_used = $date_last_used;
    }
    
    public function getId() {
        return $this->id;
    }

    public function getLecture_id() {
        return $this->lecture_id;
    }

    public function getType() {
        return $this->type;
    }

    public function getText() {
        return $this->text;
    }

    public function getAnswer() {
        return $this->answer;
    }

    public function getDifficulty() {
        return $this->difficulty;
    }

    public function getFrequency() {
        return $this->frequency;
    }

    public function getPoints() {
        return $this->points;
    }

    public function getSpace() {
        return $this->space;
    }

    public function getDate_created() {
        return $this->date_created;
    }

    public function getDate_last_used() {
        return $this->date_last_used;
    }
}


