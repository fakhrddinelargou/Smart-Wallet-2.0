<?php

require_once __DIR__ . "/../core/Database.php";





class Income
{

    private $db;
    public $id;
    public $amount;
    public $description;
    public $date;
    public $user_id;
    public $category_id;


    public function __construct()
    {
        $database = new Database();
        $this->db = $database->connect();
    }

    // Create Income
    public function createIncome()
    {
        $stmt = $this->db->prepare("INSERT INTO incomes(user_id,amount,description,date,category_id) VALUES (?,?,?,?,?)");
        $stmt->execute([$this->user_id, $this->amount, $this->description, $this->date, $this->category_id]);
        return true;
    }

    // Get All Incomes
    public function getAllIncomes()
    {
        $stmt = $this->db->prepare("SELECT incomes.* , categories.fullName AS category_name FROM incomes JOIN categories ON incomes.category_id = categories.id  WHERE incomes.user_id = ?");
        $stmt->execute([$this->user_id]);
        $fetchIncomes = $stmt->fetchAll(PDO::FETCH_ASSOC);
        return $fetchIncomes;
    }

    // Update Incomes
    public function updateIncome()
    {
        $stmt = $this->db->prepare("UPDATE incomes SET amount = ? , description = ? , date = ?  WHERE id = ? AND user_id = ? ");
        $stmt->execute([$this->amount, $this->description, $this->date, $this->id, $this->user_id]);
        return true;
    }

    // public function getByCategory(){}

    // Get income by ID
    public function getByID()
    {
        $stmt = $this->db->prepare("SELECT * FROM incomes  WHERE id = ? AND user_id = ?");
        $stmt->execute([$this->id, $this->user_id]);
        $income = $stmt->fetch(PDO::FETCH_ASSOC);
        return $income;
    }

    // Delete Income
    public function deleteIncome()
    {
        $stmt = $this->db->prepare("DELETE FROM  incomes WHERE id =? AND user_id =? ");
        $stmt->execute([$this->id, $this->user_id]);
        return true;
    }
}
