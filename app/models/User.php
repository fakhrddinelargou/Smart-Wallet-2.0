<?php

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

require_once __DIR__ . '/../../vendor/autoload.php';
require_once __DIR__ . "/../core/Database.php";

class User {

    private $db;

    public function __construct(){
        $database = new Database();
        $this->db = $database->connect();
    }

    public function register($email, $password){
        $stmt = $this->db->prepare("SELECT email FROM users WHERE email = ?");
        $stmt->execute([$email]);

        if ($stmt->fetch()) {
            return false;
        }

        $stmt = $this->db->prepare(
            "INSERT INTO users(email, password) VALUES (?, ?)"
        );
        return $stmt->execute([$email, $password]);
    }

    public function login($email, $password){
        $stmt = $this->db->prepare("SELECT * FROM users WHERE email = ?");
        $stmt->execute([$email]);
        $user = $stmt->fetch(PDO::FETCH_ASSOC);

        if (!$user || !password_verify($password, $user['password'])) {
            return false;
        }

        $_SESSION['temp_user_id'] = $user['id'];

        return $this->sendOtp($email);
    }

    private function sendOtp($email){
        $otp = random_int(100000, 999999);
        $_SESSION['email_otp'] = $otp;
        $_SESSION['email_otp_expires'] = time() + 300;

        try {
            $mail = new PHPMailer(true);
            $mail->isSMTP();
            $mail->Host = 'smtp.gmail.com';
            $mail->SMTPAuth = true;
            $mail->Username = getenv("EMAIL");
            $mail->Password = getenv('APP_PASSWORD');
            $mail->SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS;
            $mail->Port = 587;

            $mail->setFrom(getenv('EMAIL'), 'Smart Wallet 2.0');
            $mail->addAddress($email);
            $mail->Subject = 'Verify your email';
            $mail->Body = "Hello! \n\nYour verification code is: {$otp}\n\nThis code will expire in 5 minutes.\n\nSmart Wallet Team";
            $mail->send();

            return true;

        } catch (Exception $e) {
            return false;
        }
    }

    public function verifyOtp($otp){
        if (
            isset($_SESSION['email_otp']) ||
            time() < $_SESSION['email_otp_expires'] ||
            $_SESSION['email_otp'] == $otp
        ) {
            echo "yalala";
            $_SESSION['user_id'] = $_SESSION['temp_user_id'];
            unset(
                $_SESSION['temp_user_id'],
                $_SESSION['email_otp'],
                $_SESSION['email_otp_expires']
            );
        }else{

            return false;
        }
        


        return true;
    }
}
