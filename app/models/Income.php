<?php

require "../../core/Database.php";





class Income{
    
    private $db;
    public $user_id;
    public $category_id;
    public $amount;
    public $description;
    public $date;
    

    public function __consturt(){
        $conn = new Database();
        $this->db = $conn->connet();
    }

    private function createIncome($user_id,$category_id,$amount,$description,$date){
        $stmt = $this->db->prepare("INSERT INTO incomes (user_id,amount,description,category_id,date) VALUES (?,?,?,?,?)"); 
        $stmt->execute([$user_id,$amount,$description,$category_id,$date]);
    }
    public function getAllIncome(){}
    public function getByID(){}
    public function getByCategory(){}
    public function updateIncome(){}
    public function deleteIncome(){}
}


?>