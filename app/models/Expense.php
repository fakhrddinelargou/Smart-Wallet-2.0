<?php

require_once __DIR__ . "/../core/Database.php";

class Expense
{

    private $db;
    public $id;
    public $amount;
    public $description;
    public $date;
    public $user_id;
    public $category_id;


    public function  __construct()
    {
        $database = new Database();
        $this->db = $database->connect();
    }

    // Create Expense
    public function createExpense()
    {
        $stmt = $this->db->prepare("INSERT INTO expenses(amount,date,description,user_id,category_id) VALUES (?,?,?,?,?)");
        $stmt->execute([$this->amount, $this->date, $this->description, $this->user_id, $this->category_id]);
        return true;
    }

    // Get All Expenses
    public function getAllExpenses()
    {
        $stmt = $this->db->prepare("SELECT expenses.*,categories.fullName AS category FROM expenses JOIN categories ON expenses.category_id = categories.id WHERE user_id = ?");
        $stmt->execute([$this->user_id]);
        $getAllExpenses = $stmt->fetchAll(PDO::FETCH_ASSOC);
        return $getAllExpenses;
    }

    // Get Expense By ID
    public function  getById()
    {
        $stmt = $this->db->prepare("SELECT * FROM expenses WHERE id = ? AND user_id = ?");
        $stmt->execute([$this->id, $this->user_id]);
        $getExpense = $stmt->fetch(PDO::FETCH_ASSOC);
        return $getExpense;
    }

    // update Expense
    public function updateExpense()
    {
        $stmt = $this->db->prepare("UPDATE expenses SET amount = ? , description = ? , date = ?  WHERE id = ? AND user_id = ? ");
        $stmt->execute([$this->amount, $this->description, $this->date, $this->id, $this->user_id]);
        return true;
    }

    // Delete Expense
    public function deleteExpense(){
        $stmt = $this->db->prepare("DELETE FROM expenses WHERE id = ? AND user_id=? ");
        $stmt->execute([$this->id , $this->user_id]);
        return true;
    }

}
