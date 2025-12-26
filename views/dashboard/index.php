<?php

require_once __DIR__ . "/../../app/models/Income.php";
require_once __DIR__ . "/../../app/models/Expense.php";
// require_once __DIR__ . "/../incomes/delete.php";

session_start();
$user_id = $_SESSION['user_id'];
// echo $user_id;
if (empty($user_id)) {
  header("Location: ../auth/Login.php");
  exit;
}

if (isset($_GET['logout'])) {
  unset($_SESSION['user_id']);
  exit;
}
$income = new Income();
$expense = new Expense();
$expense->user_id = $user_id;
$income->user_id = $user_id;
$getAllIncomes = $income->getAllIncomes();
$getAllExpenses = $expense->getAllExpenses();
// print_r($getAllExpenses);

?>

<!DOCTYPE html>
<html lang="en">

<head>

  <style>
    * {
      margin: 0;
      padding: 0;
      box-sizing: border-box;
      font-family: 'Inter', sans-serif;
    }

    body {
      background: #f9fafb;
      min-height: 100vh;
    }

    /* Layout */
    .layout {
      display: flex;
      min-height: 100vh;
    }

    /* Sidebar */
    .sidebar {
      width: 250px;
      background: #fff;
      border-right: 1px solid #e5e7eb;
      padding: 30px 20px;
    }

    .brand {
      font-size: 20px;
      margin-bottom: 30px;
    }

    .menu a {
      display: block;
      padding: 12px 14px;
      margin-bottom: 8px;
      border-radius: 10px;
      color: #111;
      cursor: pointer;
    }

    .menu a.active,
    .menu a:hover {
      background: #000;
      color: #fff;
    }

    /* Main */
    .main {
      flex: 1;
      padding: 30px;
    }

    /* Header */
    .main-header {
      display: flex;
      justify-content: space-between;
      align-items: center;
      margin-bottom: 30px;
    }

    .main-header h1 {
      font-size: 22px;
    }

    .main-header p {
      font-size: 14px;
      color: #6b7280;
    }

    .btn-primary {
      background: #000;
      color: #fff;
      padding: 12px 16px;
      border-radius: 12px;
      text-decoration: none;
      font-size: 14px;
    }

    /* Card */
    .card {
      background: #fff;
      border: 1px solid #e5e7eb;
      border-radius: 16px;
      padding: 24px;
      box-shadow: 0 20px 40px rgba(0, 0, 0, .06);
      width: 100%;
    }

    .card h3 {
      margin-bottom: 16px;
    }

    /* Table */
    .tables {
      display: flex;
      align-items: start;
      width: 100%;
      gap: 5px;
    }

    .table {
      width: 100%;
      border-collapse: collapse;
    }

    .table th {
      text-align: left;
      font-size: 13px;
      color: #6b7280;
      padding-bottom: 12px;
    }

    .table td {
      padding: 14px 0;
      border-top: 1px solid #f1f5f9;
      font-size: 14px;
    }

    /* Actions */
    .actions {
      display: flex;
      gap: 8px;
    }

    .btn-edit {
      padding: 6px 12px;
      border-radius: 10px;
      background: #fef3c7;
      color: #92400e;
      font-size: 13px;
      text-decoration: none;
    }

    .btn-delete {
      padding: 6px 12px;
      border-radius: 10px;
      background: #fee2e2;
      color: #991b1b;
      font-size: 13px;
      text-decoration: none;
    }
  </style>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Document</title>
</head>

<body>



  <div class="layout">

    <!-- Sidebar -->
    <aside class="sidebar">
      <h2 class="brand">MyFinance</h2>

      <nav class="menu">
        <a class="active">Dashboard</a>
        <a>Incomes</a>
        <a>Expenses</a>
        <a>Categories</a>
      </nav>
    </aside>

    <!-- Main -->
    <main class="main">

      <header class="main-header">
        <div>
          <h1>Dashboard</h1>
          <p>Manage your incomes & expenses</p>
        </div>

        <a href="../transactions/create.php" class="btn-primary">+ Add Transaction</a>
      </header>

      <section class="tables">

        <!-- Incomes Card -->
        <section class="card">
          <h3>Incomes</h3>

          <table class="table">
            <thead>
              <tr>
                <th>Amount</th>
                <th>Description</th>
                <th>Date</th>
                <th>Category</th>
                <th></th>
              </tr>
            </thead>

            <tbody>
              <?php foreach ($getAllIncomes as $income) { ?>
                <tr>
                  <td><?= $income["amount"] ?> DH</td>
                  <td><?= $income["description"] ?></td>
                  <td><?= $income["date"] ?></td>
                  <td><?= $income["category_name"] ?></td>
                  <td class="actions">
                    <a href="../transactions/update.php?editIncome=<?= $income['id'] ?>" class="btn-edit">Edit</a>
                    <a href="../incomes/delete.php?deletIncome=<?=  $income['id'] ?>" class="btn-delete">Delete</a>
                  </td>
                </tr>
              <?php } ?>

            </tbody>
          </table>
        </section>

        <!-- Expenses Card -->
        <section class="card">
          <h3>Expenses</h3>

          <table class="table">
            <thead>
              <tr>
                <th>Amount</th>
                <th>Description</th>
                <th>Date</th>
                <th>Category</th>
                <th></th>
              </tr>
            </thead>

            <tbody>
              <?php foreach ($getAllExpenses as $expense) { ?>
                <tr>
                  <td><?= $expense["amount"] ?> DH</td>
                  <td><?= $expense["description"] ?></td>
                  <td><?= $expense["date"] ?></td>
                  <td><?= $expense["category"] ?></td>
                  <td class="actions">
                    <a href="../transactions/update.php?editExpense=<?= $expense['id'] ?>" class="btn-edit">Edit</a>
                    <a href="../expenses/delete.php?deletExpense=<?=  $expense['id'] ?>" class="btn-delete">Delete</a>
                  </td>
                </tr>
              <?php } ?>

            </tbody>
          </table>
        </section>

      </section>

    </main>
  </div>

</body>

</html>