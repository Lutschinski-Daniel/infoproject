<?php

class ExamEngine {
    
    private $conn;
    private $lecture;
    private $max_points;
    
    private $tmp_exam = array();
    private $tmp_points = 0;
    private $difficulty_for_average = 0;
    private $tmp_average = 0;
    private $referenz_average = 2.5;
  
    private $map;   
    private $map_bypassed;
    private $array_switched = array();
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
    
    public function getQuestionsBypassedToSwitch($id){
        $looking_for = "";
        foreach($this->tmp_exam as $quest){
            if($quest->id == $id){
                $looking_for = $quest;
                break;
            }
        }
        
        $ret_val = array();
        for( $i = 1; $i <= 5; $i++){
            foreach($this->map_bypassed[$i] as $question){
                if( $question != "" && $question->type == $looking_for->type){
                    $ret_val[] = $question;
                }
            }
        }   
        return $ret_val;
    }
    
    public function getQuestionsUnusedToSwitch($id){
        $looking_for = "";
        foreach($this->tmp_exam as $quest){
            if($quest->id == $id){
                $looking_for = $quest;
                break;
            }
        }
        
        $ret_val = array();
        for( $i = 1; $i <= 5; $i++){
            for($j = $this->pointer[$i]; $j < count($this->map[$i]); $j++){
                $tmp = $this->map[$i][$j];
                if($tmp->type == $looking_for->type){
                    $ret_val[] = $tmp;
                }
            }
        }   
        return $ret_val;
    }
    
    public function getQuestionsToSwitch($id){
        $looking_for = "";
        foreach($this->tmp_exam as $quest){
            if($quest->id == $id){
                $looking_for = $quest;
                break;
            }
        }
        $bypassed = array();
        for( $i = 1; $i <= 5; $i++){
            foreach($this->map_bypassed[$i] as $question){
                if( $question != ""){
                    $bypassed[] = $question;
                }
            }
        }   
        
        $unused = array();
        for( $i = 1; $i <= 5; $i++){
            for($j = $this->pointer[$i]; $j < count($this->map[$i]); $j++){
                $unused[] = $this->map[$i][$j];
            }
        }   
        
        $switched = array();
        foreach($this->array_switched as $tmp_quest){
            $switched[] = $tmp_quest;
        }
        
        $ret_array = array("BY" => $bypassed, "UN" => $unused, "SW" => $switched);
        return $ret_array;
    }
    
    private function updateOrder($order){
         $tmp;
         foreach($order as $id){
             foreach($this->tmp_exam as $question){
                if($question->id != $id){
                     continue;
                }
                $tmp[] = $question;
                break;
             }
         }
         $this->tmp_exam = $tmp;
     }
    
    public function switchQuestionWith($quesiton_old_id, $question_new_id){
        $question_new ="";
        for( $i = 1; $i <= 5; $i++){
            for($j = $this->pointer[$i]; $j < count($this->map[$i]); $j++){
                $quest = $this->map[$i][$j];
                if($quest->id != $question_new_id)
                    continue;
                $question_new = $quest;
                array_splice($this->map[$i], $j, 1);
                break;
            }
        }   
        
        if ($question_new == ""){
            for( $i = 1; $i <= 5; $i++){
                for($j = 0; $j < count($this->map_bypassed[$i]); $j++){
                    $question = $this->map_bypassed[$i][$j];
                    if($question == ""){
                        continue;
                    }
                    if($question->id != $question_new_id){
                        continue;
                    }
                    $question_new = $question;
                    array_splice($this->map_bypassed[$i], $j, 1);
                    break;
                }
            }  
        }
        
        if ($question_new == ""){
            for($i = 0; $i < count($this->array_switched); $i++){
            $question = $this->array_switched[$i];
                if($question->id != $question_new_id){
                    continue;
                }
                $question_new = $question;
                array_splice($this->array_switched, $i, 1);
                break;
            }
        }
        
        for($i=0; $i < count($this->tmp_exam); $i++) {
            $quest = $this->tmp_exam[$i];
            if($quest->id != $quesiton_old_id){
                continue;
            }
            $this->array_switched[] = $quest;
            $this->tmp_exam[$i] = $question_new;
        }
    }
    
    public function saveAndReset($conn){
        $conn->updateDates($this->tmp_exam);
    }    
    
    public function getTmpExam($order){
        $type_MC = array();
        $type_WI = array();
        $type_TR = array();

        if($order != null){
            $this->updateOrder($order);
        }
        
        foreach($this->tmp_exam as $quest){
            if($quest->type === 0){
                $type_MC[] = $quest;
            } elseif ($quest->type === 1) {
                $type_WI[] = $quest;
            } else {
                $type_TR[] = $quest;
            }  
        }
        $retMap = array("MC" => $type_MC, "WI" => $type_WI, "TR" => $type_TR);
        return $retMap;
    }
    
    public function getAverage(){
        $average = 0;
        foreach($this->tmp_exam as $question){
            $average = $average + $question->difficulty;
        }
        $average = $average / count($this->tmp_exam);
        return number_format($average, 2);
    }
    
    public function getPoints(){
        $points = 0;
        foreach($this->tmp_exam as $question){
            $points = $points + $question->points;
        }
        return $points;
    }
    
    public function getBereichsPunkte(){
        $p_MC = 0;
        $p_WI = 0;
        $p_TR = 0;
        foreach($this->tmp_exam as $quest){
            if($quest->type === 0){
                $p_MC += $quest->points;
            } elseif($quest->type === 1){
                $p_WI += $quest->points;
            } else {
                $p_TR += $quest->points;
            }
        }
        $ret = array("p_MC" => $p_MC, "p_WI" => $p_WI, "p_TR" => $p_TR);
        return $ret;
    }
    
    public function deleteFromTmpExam($id){
        for($i = 0; $i < count($this->tmp_exam); $i++){
            $question = $this->tmp_exam[$i];
            if($question->id === $id){
                $this->array_switched[] = $question;
                array_splice($this->tmp_exam, $i, 1);
                break;
            }
        }
    }
    
    public function updatePointsForId($points, $id){
        foreach($this->tmp_exam as $question){
            if($question->id === $id){
                $question->points = $points;
                break;
            }
        }
    }
}
