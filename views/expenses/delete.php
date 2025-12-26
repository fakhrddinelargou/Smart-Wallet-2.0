<?php

require_once __DIR__ . "/../../app/models/Expense.php";

session_start();

$user_id = $_SESSION['user_id'];

if(isset($_GET['deletExpense'])){
    $id = $_GET['deletExpense'];
    $expense = new Expense();
    $expense->id = $id;
    $expense->user_id = $user_id;
    $expense->deleteExpense();
    header("Location: ../dashboard/index.php");
}


?>