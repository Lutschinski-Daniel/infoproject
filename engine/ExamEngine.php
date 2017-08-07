<?php

class ExamEngine {
    
    private $conn;
    private $lecture;
    private $max_points;
    
    private $tmp_exam = array();
    private $tmp_points = 0;
    private $difficulty_for_average = 0;
    private $average = 0;
  
    private $map;   
    private $map_bypassed;
    private $pointer = array(
        "1" => "0", 
        "2" => "0",
        "3" => "0",
        "4" => "0",
        "5" => "0"
    );
    
    public function __construct($lecture_id, $points, $conn_to_db) {
        $this->lecture = $lecture_id;
        $this->max_points = intval($points);
        $this->conn = $conn_to_db;
        $this->loadQuestions();
        if( !$this->isPossible() )
            return; // TODO: FEHLER SETZEN
        $this->createRandomExam();
    } 
    
    private function createRandomExam(){
        // Anhand der Max-Points, gebe Klausur zurück
        // speichern der Fragen in $tmp_exam
        //while ($this->tmp_points < $this->max_points) {
        $count = 0;
        while( !$this->locked() && $this->tmp_points < $this->max_points ){
            $arrNo = $this->randomlyGetNextArrayNo();
            $quest = $this->getQuestionFromArray($arrNo);
            if($quest == null){
                $count++;
                continue;
            } else {
                $this->tmp_exam[] = $quest;
                $this->tmp_points += $quest->points;
                $this->difficulty_for_average += $quest->difficulty;
                $this->average = $this->difficulty_for_average / count($this->tmp_exam);
            }
        }
        file_put_contents("6Fragen.txt", var_export($this->tmp_exam, true));
    }
    
    private function locked(){
        for($i=1; $i<=5; $i++) {
            $count = count($this->map[$i]);
            $pointer = $this->pointer[$i];
            
            if( $count > $pointer ){
                return false;
            }
        }
        // Alle Pointer gleich groß wie "Länge" -> Lock
        return true;
    }
    
    private function getQuestionFromArray($arrNo){
        $pointer = intval($this->pointer[$arrNo]);
        $count = count($this->map[$arrNo]);
        
        if( $pointer < $count ){
            $question = $this->map[$arrNo][$pointer];
            if( $this->tmp_points > $this->max_points/3 ){
                if( $question->difficulty > 3 && $this->average > 3 ){
                    $this->map_bypassed[$arrNo][] = $question;
                    $question = null;
                } elseif( $question->difficulty < 3 && $this->average < 3 ) {
                    $this->map_bypassed[$arrNo][] = $question;
                    $question = null;
                }
            }
            $this->pointer[$arrNo]++;
            return $question;
        }
        return null;
    }
    
    private function loadQuestions(){
        for( $i = 1; $i <= 5; $i++){
            $this->map[$i] = $this->conn->getArrayWithFreq($this->lecture, $i);
        }        
    }
  
    private function randomlyGetNextArrayNo(){
        $random = random_int(1, 15);
        if ($random == 1) {
            return 1;
        } elseif ($random == 2 || $random == 3) {
            return 2;
        } elseif ($random > 3 && $random < 7) {
            return 3;
        } elseif ($random >= 7 && $random < 11) {
            return 4;
        }
        return 5;
    }
    
    public function switchQuestion($quesiton_id){
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
        return true;
    }
    
    public function getTmpExam(){
        return $this->tmp_exam;
        //return $this->conn->getAllQuestions4Lec($this->lecture);
    }
}
