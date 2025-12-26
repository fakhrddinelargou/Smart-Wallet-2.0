<?php
require_once __DIR__ . "/../../app/models/Income.php";
session_start();
$user_id  = $_SESSION['user_id'];
echo $user_id;
$income = new Income();
// $expense = new Expense();

if (isset($_GET['deletIncome'])) {
  $id = $_GET['deletIncome'];
   echo $_SESSION['user_id'] .  $id;
  
  $income->id = $id;
  $income->user_id = $user_id;
  $deletIncome = $income->deleteIncome();
  if($deletIncome){
    header("Location: ../dashboard/index.php");
  }
}


?>