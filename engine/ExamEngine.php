<?php

class ExamEngine {
    
    private $conn;
    private $lecture;
    private $max_points;
    
    private $tmp_exam = array();
    private $tmp_points = 0;
    private $difficulty_for_average = 0;
    private $tmp_average = 0;
    private $referenz_average = 3;
  
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
        $this->initMapBypassed();
        if( !$this->isPossible() )
            return; // TODO: FEHLER SETZEN
        $this->createRandomExam();
    } 
    
    private function initMapBypassed(){
        for( $i = 1; $i <= 5; $i++){
            $this->map_bypassed[$i] = array();
        }  
    }
    
    private function createRandomExam(){
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
                $this->updateAverage();
            }
        }
        file_put_contents("6Fragen.txt", var_export($this->tmp_exam, true));
    }
    
    private function updateAverage(){
        $this->tmp_average = $this->difficulty_for_average / count($this->tmp_exam);
    }
    
    private function locked(){
        for($i=1; $i<=5; $i++) {
            $count = count($this->map[$i]);
            $pointer = intval($this->pointer[$i]);
            
            if( $count > $pointer ){
                return false;
            }
        }
        // Alle Pointer mindestens gleich groß wie "Länge" -> Lock!
        return true;
    }
    
    private function getQuestionFromArray($arrNo){
        $pointer = intval($this->pointer[$arrNo]);
        $count = count($this->map[$arrNo]);
        
        if( $pointer < $count ){
            $question = $this->map[$arrNo][$pointer];
            if( $this->tmp_points > $this->max_points/3 ){
                if( isset($this->map_bypassed[$arrNo]) && count($this->map_bypassed[$arrNo]) > 0 ){
                    for($i=0; $i < count($this->map_bypassed[$arrNo]); $i++){
                        $quest_by = $this->map_bypassed[$arrNo][$i];
                        if( $quest_by == "" )
                            continue;
                        if( $quest_by->difficulty >= 3 && $this->tmp_average <= $this->referenz_average ){
                            $this->map_bypassed[$arrNo][$i] = "";
                            //unset($this->map_bypassed[$arrNo][$i]);// = "";
                            return $quest_by;
                        } elseif( $quest_by->difficulty <= 3 && $this->tmp_average >= $this->referenz_average ) { 
                            $this->map_bypassed[$arrNo][$i] = "";
                            //unset($this->map_bypassed[$arrNo][$i]);
                            return $quest_by;
                        }
                    }
                }
                             
                if( $question->difficulty >= 3 && $this->tmp_average >= $this->referenz_average ){
                    $this->map_bypassed[$arrNo][] = $question;
                    $question = null;
                } elseif( $question->difficulty <= 3 && $this->tmp_average <= $this->referenz_average ) {
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
    
    public function getQuestionsBypassedToSwitch(){
        $ret_val = array();
        for( $i = 1; $i <= 5; $i++){
            foreach($this->map_bypassed[$i] as $question){
                if( $question != "" )
                    $ret_val[] = $question;
            }
        }   
        return $ret_val;
    }
    
    public function getQuestionsUnusedToSwitch(){
        $ret_val = array();
        for( $i = 1; $i <= 5; $i++){
            for($j = $this->pointer[$i]; $j < count($this->map[$i]); $j++){
                $ret_val[] = $this->map[$i][$j];
            }
        }   
        return $ret_val;
    }
    
    public function switchQuestionWith($quesiton_old_id, $question_new_id){
        $question_new ="";
        for( $i = 1; $i <= 5; $i++){
            for($j = $this->pointer[$i]; $j < count($this->map[$i]); $j++){
                $quest = $this->map[$i][$j];
                if($quest->id != $question_new_id)
                    continue;
                $question_new = $this->map[$i][$j];
                break;
            }
        }   
        if ($question_new == ""){
            for( $i = 1; $i <= 5; $i++){
                foreach($this->map_bypassed[$i] as $question){
                    if($question == ""){
                        continue;
                    }
                    if($question->id != $question_new_id){
                        continue;
                    }
                    $question_new = $question;
                    break;
                }
            }  
        }
        for($i=0; $i < count($this->tmp_exam); $i++) {
            $quest = $this->tmp_exam[$i];
            if($quest->id != $quesiton_old_id){
                continue;
            }
            $this->tmp_exam[$i] = $question_new;
            return;
        }
    }
    
    public function saveAndReset($conn){
        $conn->updateDates($this->tmp_exam);
    }    
    
    private function isPossible(){
        // Check if klausur possible (genug fragen etc.)
        // return TRUE/FALSE
        return true;
    }
    
    public function getTmpExam(){
        return $this->tmp_exam;
    }
    
    public function getAverage(){
        return number_format($this->tmp_average, 2);
    }
    
    public function getPoints(){
        return $this->tmp_points;
    }
}
