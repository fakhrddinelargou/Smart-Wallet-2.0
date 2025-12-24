<?php
require_once __DIR__ . "/../../app/models/User.php";

session_start();

if(empty($_SESSION['email_otp'])){

    header("Location: ../auth/login.php");
   exit;
}

$error= $_SESSION['error'] ?? null;
unset($_SESSION['error']);
if($_SERVER["REQUEST_METHOD"] == "POST" || isset($_GET['resend'])){

    $otp_code = $_POST['otp_code'];
    $user = new User();
    $success = $user->verifyOtp($otp_code);
    if(!$success){
        $_SESSION['error'] = "Invalid Data";
        header("Location: otp.php");
        exit;
    }
    if($success || !empty($c)){
        header("Location: ../dashboard/index.php");
        exit;
    } 
    
    
}

?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <title>Email Verification</title>
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
  
  <h2>Email Verification</h2>
  <p class="subtitle">
    We have sent a verification code to your email
  </p>

  <!-- OTP boxes -->
  <div class="otp-box">
    <input type="text" maxlength="1">
    <input type="text" maxlength="1">
    <input type="text" maxlength="1">
    <input type="text" maxlength="1">
    <input type="text" maxlength="1">
    <input type="text" maxlength="1">
  </div>

  <!-- 🔑 Hidden input li kayjma3 l code -->
  <input type="hidden" name="otp_code" id="otp_code">

  <button type="submit">Verify Email</button>
  <p class="switch">
    Didn't receive the code?
    <a href="otp.php?resend=1">Resend</a>
  </p>
  
      <div class="bottom-design">
        <span></span>
        <span></span>
        <span></span>
      </div>

</form>

  </div>
<script src="../../js/otp.js"></script>
</body>
</html>
