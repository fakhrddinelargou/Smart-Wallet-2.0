<?php
require_once __DIR__ . "/../../app/models/User.php";
session_start();



$error= $_SESSION['error'] ?? null;
unset($_SESSION['error']);
$pass = true;
$fullName = "";
$email = "";
$password = "" ;
$confirm_password ="";

if($_SERVER["REQUEST_METHOD"] == "POST"){
    $fullName = $_POST['fullName'];
    $email = $_POST['email'];
    $password = $_POST['password'];
    $confirm_password = $_POST['confirm_password'];

    if (!preg_match("/^[a-zA-Z\s]{3,50}$/", $fullName)) {
        $_SESSION['error'] = "Invalid full name";
        header("Location: register.php");
        exit;
    }
    
    if (!preg_match("/^(?=.*[a-z])(?=.*[A-Z])(?=.*\d).{8,}$/", $password)) {
        $pass = false;
    }

    if ($password !== $confirm_password) {
            $_SESSION['error'] = "Passwords do not match";
            header("Location: register.php");
            exit;
    }

        
        $hash_password = password_hash($password,PASSWORD_DEFAULT);
        $user = new User();
        $success = $user->register($email,$hash_password);
        
        if (!$success) {
        $_SESSION['error'] = "Email already exists";
        header("Location: register.php");
        exit;
    }

    header("Location: Login.php");
    exit;
}

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <link rel="stylesheet" href="/style/main.css">
  <meta charset="UTF-8">
  <title>Register</title>
  <link rel="stylesheet" href="style.css">
</head>
<body>

<!-- ALERT -->
 <?php if(!empty($error)) {  ?>
<div class="alert alert-error show" id="alert">
  <span class="icon">!</span>
  <p><?= $error ?></p>
</div>
<?php }   ?>


  <div class="container">
    <form action="register.php" class="register-form" method="POST">
      <h2>Create Account</h2>
      <p class="subtitle">Join us and manage your space</p>

      <div class="input-group">
        <label>Full Name</label>
        <input type="text" name="fullName" placeholder="John Doe">
      </div>

      <div class="input-group">
        <label>Email</label>
        <input type="email" name="email" placeholder="example@email.com" required>
      </div>

      <div class="input-group">
        <label>Password</label>
        <input type="password" name="password" placeholder="••••••••">
        <?php if(!$pass) {  ?>
            <small class="password-rules" >
                • Minimum 8 characters<br>
                • One CAPITAL letter (A–Z)<br>
                • One small letter (a–z)<br>
                • One number (0–9)
            </small>
            <?php }  ?>

      </div>

      <div class="input-group">
        <label>Confirm Password</label>
        <input type="password" name="confirm_password" placeholder="••••••••" >
      </div>

      <button type="submit">Create Account</button>

      <div class="bottom-design">
        <span></span>
        <span></span>
        <span></span>
      </div>
    </form>
  </div>


 
</body>
</html>
