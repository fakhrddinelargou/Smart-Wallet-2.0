<?php

require_once __DIR__ . "/../../app/models/User.php";

session_start();

$error = $_SESSION['error'] ?? null;
unset($_SESSION['error']);
if($_SERVER["REQUEST_METHOD"] == "POST"){

    $email = $_POST['email'];
    $password = $_POST['password'];

    $user = new User();
    $success = $user->login($email,$password);

    if(!$success){
        $_SESSION['error'] = "Invalid Data";
        header("Location: Login.php");
        exit;
    }
     header("Location: otp.php");
        exit;
    

}

?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <title>Login</title>
  <link rel="stylesheet" href="../../style/main.css">
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
    <form class="auth-form" method="POST">
      <h2>Welcome Back</h2>
      <p class="subtitle">Please login to your account</p>
      <div class="input-group">
        <label>Email</label>
        <input type="email" name="email" placeholder="example@email.com" required>
      </div>

      <div class="input-group">
        <label>Password</label>
        <input type="password" name="password" placeholder="••••••••" required>
      </div>

      <button type="submit">Login</button>

      <p class="switch">
        Don’t have an account?
        <a href="register.php">Create one</a>
      </p>

      <div class="bottom-design">
        <span></span>
        <span></span>
        <span></span>
      </div>
    </form>
  </div>

</body>
</html>
