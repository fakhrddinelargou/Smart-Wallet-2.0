<?php

$income = new Income();
// $expense = new Expense();

if (isset($_GET['deletIncome'])) {
  $id = $_GET['deletIncome'];
  echo $id;
  $income->id = $id;
  $income->user_id = $user_id;
  $deletIncome = $income->deleteIncome();
  if($deletIncome){
    header("Location: ../dashboard/index.php");
  }
}


?>