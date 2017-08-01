<?php

class ExamEngine {
    
    // Was sollen die Arrays von den Fragen beinhalten
    private $array_1 = array(); 
    private $array_2 = array(); 
    private $array_3 = array(); 
    private $array_4 = array(); 
    private $array_5 = array(); 
    
    private $array_pointer = array(
        "1" => 0, 
        "2" => 0,
        "3" => 0,
        "4" => 0,
        "5" => 0
    );
    
    private $tmp_exam = array();
    
    private $lecture;
    private $max_points;
    private $tmp_points = 0;
    private $average = 3;
    private $conn;
    
    public function __construct($lecture_id, $points, $conn_to_db) {
        $this->lecture = $lecture_id;
        $this->max_points = $points;
        $this->conn = $conn_to_db;
        $this->loadQuestions();
        if( !$this->isPossible() )
            return; // TODO: FEHLER SETZEN
        $this->createRandomExam();
    } 
    
    private function createRandomExam(){
        // Anhand der Max-Points, gebe Klausur zurück
        // speichern der Fragen in $tmp_exam
        while ($this->tmp_points < $this->max_points) {
            $arrNo = $this->randomlyGetNextArrayNo();
            $quest = $this->getQuestionFromArray($arrNo);
            if($quest == null)
                continue;
            else {
                $this->tmp_exam[] = $quest;
            $this->tmp_points += $quest['points'];
            };
        }
    }
    
        
    private function getQuestionFromArray($arrNo){
        $arr = $this->getArrWitNo($arrNo);
        $quest = $arr[$this->array_pointer[$arrNo]];
        file_put_contents("6Fragen.txt", $quest, FILE_APPEND);
    }
    
    private function loadQuestions(){
        $this->array_1 = $this->conn->getArrayWithFreq($this->lecture, 1);
        $this->array_2 = $this->conn->getArrayWithFreq($this->lecture, 2);
        $this->array_3 = $this->conn->getArrayWithFreq($this->lecture, 3);
        $this->array_4 = $this->conn->getArrayWithFreq($this->lecture, 4);
        $this->array_5 = $this->conn->getArrayWithFreq($this->lecture, 5);
        
        file_put_contents("1.txt", var_export($this->array_1, true));
        file_put_contents("2.txt", var_export($this->array_2, true));
        file_put_contents("3.txt", var_export($this->array_3, true));
        file_put_contents("4.txt", var_export($this->array_4, true));
        file_put_contents("5.txt", var_export($this->array_5, true));
    }
    
    private function getArrWitNo($no){
        if ($no == 1) {
            return $this->array_1;
        } elseif ($no == 2) {
            return $this->array_2;
        } elseif ($no == 3) {
            return $this->array_3;
        } elseif ($no == 4) {
            return $this->array_4;
        } else {
            return $this->array_5;
        };
    }
    
    private function randomlyGetNextArrayNo(){
        // Zuordnung Zahl -> Array goes here
        // Zurückgeben, welche Liste gewählt wurde
        $random = random_int(1, 15);
        if ($random == 1) {
            return 1;
        } elseif ($random == 2 || $random == 3) {
            return 2;
        } elseif ($random > 3 && $random < 7) {
            return 3;
        } elseif ($random >= 7 && $random < 11) {
            return 4;
        } else {
            return 5;
        };
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
        $res = $this->conn->getAllQuestions4Lec($this->lecture);
        $arrObj = new ArrayObject($res);
        $v = var_export($arrObj, true);
        file_put_contents("test.txt", $v);
        return $res;
    }
}
