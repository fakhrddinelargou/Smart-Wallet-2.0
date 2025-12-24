<?php

require_once __DIR__ . "/../../app/models/Income";

session_start();

if(empty($_SESSION['user_id'])){
header("Location: ../auth/Login.php");
exit;
}

if(isset($_GET['logout'])){
    unset($_SESSION['user_id']);
    exit;
}

?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <title>Dashboard</title>
  <link rel="stylesheet" href="/../../style/main.css">
</head>
<body>

<!-- TOP NAVBAR -->
<nav class="navbar">
  <div class="nav-left">
    <button class="menu-btn">☰</button>
    <span class="logo">Dashboard</span>
  </div>

  <div class="nav-right">
    <img src="https://flowbite.com/docs/images/people/profile-picture-5.jpg" class="avatar">

        <a class="logout" href="../dashboard/index.php?logout=1">
<!--
category: System
tags: [exit, shut, unplug, close]
version: "1.4"
unicode: "eba8"
-->
<svg
  xmlns="http://www.w3.org/2000/svg"
  width="25"
  height="25"
  viewBox="0 0 24 24"
  fill="none"
  stroke="#273549"
  stroke-width="1.25"
  stroke-linecap="round"
  stroke-linejoin="round"
>
  <path d="M14 8v-2a2 2 0 0 0 -2 -2h-7a2 2 0 0 0 -2 2v12a2 2 0 0 0 2 2h7a2 2 0 0 0 2 -2v-2" />
  <path d="M9 12h12l-3 -3" />
  <path d="M18 15l3 -3" />
</svg>

        </a>

  </div>
</nav>

<!-- SIDEBAR -->
<aside class="sidebar">
  <ul>
    <li class="active">Dashboard</li>
    <li>Kanban</li>
    <li>Inbox</li>
    <li>Users</li>
    <li>Products</li>
    <li>Logout</li>
  </ul>
</aside>

<!-- MAIN CONTENT -->
<main class="content">



</main>

</body>
</html>

