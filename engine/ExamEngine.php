<?php

class ExamEngine {
    
    // Was sollen die Arrays von den Fragen beinhalten
    private $array_1 = array(); 
    private $array_2 = array(); 
    private $array_3 = array(); 
    private $array_4 = array(); 
    private $array_5 = array(); 
    
    private $tmp_exam = array();
    
    private $lecture;
    private $max_points;
    private $average = 3;
    
    private function __construct($lecture_id, $points) {
        $this->lecture = $lecture_id;
        $this->max_points = $points;
    } 
    
    private function loadQuestions($lecture){
        // GET DB-Connection, load all Questions,
        // and sort into array_1-array_5!
    }
    
    private function randomlyGetNextArray(){
        // Zuordnung Zahl -> Array goes here
        // Zurückgeben, welche Liste gewählt wurde
    }
    
    private function getQuestionFromList($list){
        // Hole Frage aus Liste
        // Achte auf den bisherigen Durchschnitt
        // Rückgabeparameter 
            // Question-id bei Frage
            // NULL bei keiner?
    }
    
    private function crateRandomExam(){
        // Anhand der Max-Points, gebe Klausur zurück
        // speichern der Fragen in $tmp_exam
    }
    
    public function switchQustions($quesiton_id){
        // tausche diese Frage gegen eine ander
        // aus der Liste mit denselben Punkten ca.
        // oder im Notfall von einer anderen Liste
        // $tmp_exam updaten
    }
    
    public function saveAndReset(){
        // alle letzlich genutzten Fragen vom Datum upaten 
        // exam null setzen
    }    
    
    private function isPossible(){
        // Check if klausur possible (genug fragen etc.)
        // return TRUE/FALSE
    }
    
    public function getTmpExam(){
        // return $tmp_exam
    }
}
