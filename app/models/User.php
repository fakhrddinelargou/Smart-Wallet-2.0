<?php 

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

require_once __DIR__ . '/../../vendor/autoload.php';

require_once __DIR__ . "/../core/Database.php";

session_start();

class User {

    private $db;
    
    //  CONNECT DATABASE WITH PHP
    public function __construct(){
        $database = new Database();
         $this->db = $database->connect();
        }
  
    // REGISTER 
    public function register($email,$password){
        $stmt = $this->db->prepare("SELECT email FROM users WHERE email =? ");
        $stmt->execute([$email]);
        $user=$stmt->fetch(PDO::FETCH_ASSOC);
        if($user){
            return false;
        }

        $ajoutUser = $this->db->prepare("INSERT INTO users(email,password) VALUES(?,?)");
        return $ajoutUser->execute([$email,$password]);
    }

    // LOGIN
    public function login($email,$password){
        $stmt = $this->db->prepare("SELECT * FROM users WHERE email = ? ");
        $stmt->execute([$email]);
        $user = $stmt->fetch(PDO::FETCH_ASSOC);
        if(!$user){
        return false;
        }
        if(!password_verify($password,$user['password'])){
        return false;
        }
         $_SESSION['temp_user_id'] = $user['id'];
        $this->validateEmail($email);
        return 'OTP_SENT';
    }

    // VALIDATE EMAIL
    private function validateEmail($email){
    
    $mail = new PHPMailer(true);
    $otp = random_int(100000, 999999);
    $_SESSION['email_otp'] = $otp;
    $_SESSION['email_otp_expires'] = time() + 300;
    
    try {
        $expiresAt = date('Y-m-d H:i:s', time() + 300);
        $mail = new PHPMailer(true);
        $mail->isSMTP(); 
        $mail->Host = 'smtp.gmail.com'; 
        $mail->SMTPAuth = true; 
        $mail->Username = getenv('EMAIL'); 
        $mail->Password = getenv('APP_PASSWORD'); 
        $mail->SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS; 
        $mail->Port = 587;
        $mail->setFrom(getenv('EMAIL'), 'Smart Wallet 2.0');
        $mail->addAddress($email);
        $mail->Subject = 'Verify your email';
        $mail->Body = "Hello!,\n\nYour verification code is: {$otp}\n\nThis code will expire in 5 minutes.\n\nSmart Wallet Team";
        $mail->send();
        header("Location: otp.php");
        exit;
} catch (Exception $e) {
         echo "Error: " . $e->getMessage();
}
    }

    // VERIFY OTP
    public function verifyOtp($otp){
        if(!isset($_SESSION['email_otp']) || time() > $_SESSION['email_otp_expires']){
            return false;
        }
        if($_SESSION['email_otp'] !== $otp ){
            return false;
        }
        $_SESSION['user_id'] = $_SESSION['temp_user_id'];
            unset(
        $_SESSION['temp_user_id'],
        $_SESSION['email_otp'],
        $_SESSION['email_otp_expires']
    );
  return true;
    }
    
}

?>