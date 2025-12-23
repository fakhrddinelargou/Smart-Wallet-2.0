<?php
require_once __DIR__ . "/../../app/models/User.php";

session_start();


?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <title>Email Verification</title>
  <link rel="stylesheet" href="../../style/main.css">
</head>
<body>

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
        Didn’t receive the code?
        <a href="/views/auth/otp.php">Resend</a>
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
