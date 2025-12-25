<?php 
require_once __DIR__ . "/../../app/models/Income.php";
require_once __DIR__ . "/../../app/models/Expense.php";
session_start();

$user_id = $_SESSION['user_id'];

if(empty($user_id)){
    header("Location: ../auth/Login.php");
    exit;
}

if($_SERVER['REQUEST_METHOD'] == "POST"){
    
    $amount = $_POST['amount'];
    $description = $_POST['description'];
    $date = $_POST['date'];
    $category_id = $_POST['category'];
    $type = $_POST['type'];
    if($type == "income"){
      $income = new Income();
      $income->user_id= $user_id;
      $income->amount= $amount;
      $income->description= $description;
      $income->date= $date;
      $income->category_id= $category_id;
      $income->createIncome();
    }else{
      $expense = new Expense();
      $expense->user_id = $user_id;
      $expense->amount = $amount;
      $expense->description = $description;
      $expense->date = $date;
      $expense->category_id = $category_id;
      $expense->createExpense();
    }

    
}




?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <title>Add Transaction</title>

  <style>
    * {
      margin: 0;
      padding: 0;
      box-sizing: border-box;
      font-family: 'Inter', sans-serif;
    }

    body {
      min-height: 100vh;
      background: #f9fafb;
      display: flex;
      align-items: center;
      justify-content: center;
    }

    .container {
      width: 100%;
      max-width: 420px;
      padding: 20px;
    }

    .card {
      position: relative;
      background: #fff;
      border: 1px solid #e5e7eb;
      border-radius: 14px;
      padding: 28px;
      box-shadow: 0 20px 40px rgba(0,0,0,0.06);
    }

    /* Close page (link) */
    .card-close {
      position: absolute;
      top: 14px;
      right: 16px;
      text-decoration: none;
      font-size: 20px;
      color: #666;
    }

    .card-close:hover {
      color: #000;
    }

    h2 {
      text-align: center;
      font-size: 22px;
      margin-bottom: 6px;
      color: #000;
    }

    .subtitle {
      text-align: center;
      font-size: 14px;
      color: #666;
      margin-bottom: 18px;
    }

    /* Success card */
    .alert-success {
      display: flex;
      align-items: center;
      gap: 10px;
      background: #fff;
      border: 1px solid #bbf7d0;
      border-left: 4px solid #16a34a;
      padding: 12px 14px;
      border-radius: 10px;
      margin-bottom: 20px;
    }

    .alert-success span {
      color: #16a34a;
      font-weight: bold;
    }

    .alert-success p {
      margin: 0;
      font-size: 13px;
      color: #166534;
    }

    .alert-success a {
      margin-left: auto;
      text-decoration: none;
      font-size: 16px;
      color: #16a34a;
    }

    .alert-success a:hover {
      color: #0f5132;
    }

    .input-group {
      margin-bottom: 16px;
    }

    .input-group label {
      display: block;
      font-size: 13px;
      margin-bottom: 6px;
      color: #333;
    }

    .input-group input {
      width: 100%;
      padding: 12px 14px;
      border-radius: 10px;
      border: 1px solid #ddd;
      font-size: 14px;
      outline: none;
    }

    .input-group input:focus {
      border-color: #000;
    }

    button {
      width: 100%;
      padding: 12px;
      margin-top: 8px;
      background: #000;
      color: #fff;
      border: none;
      border-radius: 10px;
      font-size: 15px;
      cursor: pointer;
    }

    .bottom-design {
      display: flex;
      justify-content: center;
      gap: 8px;
      margin-top: 22px;
    }

    .bottom-design span {
      width: 8px;
      height: 8px;
      background: #000;
      border-radius: 50%;
      opacity: 0.2;
    } 
     .input-group {
  margin-bottom: 16px;
}

.input-group label {
  display: block;
  font-size: 13px;
  margin-bottom: 6px;
  color: #333;
}

.select-category {
  width: 100%;
  padding: 12px 14px;
  border-radius: 10px;
  border: 1px solid #e5e7eb;
  font-size: 14px;
  background: #fff;
  outline: none;
}

.select-category:focus {
  border-color: #000;
}

  </style>
</head>
<body>

  <div class="container">
    <div class="card">

      <!-- Close page -->
      <a href="../dashboard/index.php" class="card-close">×</a>

      <h2>Add Transaction</h2>
      <p class="subtitle">Enter transaction details</p>

      <?php if(isset($_GET['success'])) { ?>
        <!-- Success message -->
        <div class="alert-success">
          <span>✓</span>
          <p>Transaction added successfully</p>
        </div>
      <?php } ?>

      <form action="../transactions/create.php" method="POST">
        
        <!-- type incomes ou expenses -->
        <div class="input-group">
          <label>Type</label>
  <select name="type" id="typeSelect" class="select-category" required>
    <option  value="">Select type</option>
    <option value="income">Income</option>
    <option value="expense">Expense</option>
  </select>
</div>

<div class="input-group">
  <label>Category</label>
  <select name="category" id="categorySelect" class="select-category" required>
    <option value="">Select category</option>
    <!-- Expense -->
    <option value="1" data-type="expense">Shopping</option>
    <option value="2" data-type="expense">Food</option>
    <option value="3" data-type="expense">Transport</option>
    <option value="5" data-type="expense">Other</option>
    <!-- Income -->
    <option value="4" data-type="income">Salary</option>
  </select>
</div>

        <div class="input-group">
          <label>Amount</label>
          <input type="number" name="amount" required>
        </div>

        <div class="input-group">
          <label>Description</label>
          <input type="text" name="description" required>
        </div>

        <div class="input-group">
          <label>Date</label>
          <input type="date" name="date" required>
        </div>

        <button type="submit">Add</button>

      </form>

      <div class="bottom-design">
        <span></span>
        <span></span>
        <span></span>
      </div>

    </div>
  </div>
<script>
const typeSelect = document.getElementById('typeSelect');
const categorySelect = document.getElementById('categorySelect');

typeSelect.addEventListener('change', () => {
  const selectedType = typeSelect.value;

  [...categorySelect.options].forEach(option => {
    if (!option.dataset.type) return;

    option.style.display =
      option.dataset.type === selectedType ? 'block' : 'none';
  });

  categorySelect.value = '';
});
</script>

</body>
</html>
