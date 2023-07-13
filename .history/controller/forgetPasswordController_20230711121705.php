<?php
session_start();

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

include('../config_file.php');
require '../PHPmailer/src/Exception.php';
require '../PHPmailer/src/PHPMailer.php';
require '../PHPmailer/src/SMTP.php';
require '../models/UserModel.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
   
    $email = mysqli_real_escape_string($conn, $_POST['email']);
  

    $model = new UserModel($conn);
    $result = $model->checkRegisterUser($email);

    if ($result === true) {
        // Initialize PHPMailer
        $mail = new PHPMailer(true);

        // die('hi i am here');
        try {
            // die('hi i am here 2');
            // echo $encodedVerificationCode;
            // Configure SMTP settings
            $mail->isSMTP();
            $mail->Host = 'smtp.gmail.com';
            $mail->Port = 465;
            $mail->SMTPAuth = true;
            $mail->SMTPSecure = 'ssl';
            $mail->Username = 'ssingh30126@gmail.com';
            $mail->Password = 'ddjdjokukrbdhuro';

            // Set email properties
            $mail->setFrom('ssingh30126@gmail.com');
            $mail->addAddress($email);
            $mail->isHTML(true);
            $mail->Subject = 'Account Activation';
            $mail->Body = 'Hello, Please click the following link to activate your account: <br>';
            $urlEnd ='email='.$email;
            $mail->Body .= 'http://localhost/MVC-Assignment/controller/verificationController.php?'.$urlEnd;


            // Send the email
            $mail->send();
            
            $_SESSION['success_msg']='Email sent to your registered mail! Please verify';
            header('Location: ../index.php');
            exit;
        } catch (Exception $e) {
            // die('hi i am here 3');
            $_SESSION['error_msg'] = 'Failed to send activation email: ' . $mail->ErrorInfo;
            header('Location: ../index.php');
            exit;
        }
    } elseif (is_array($result)) {
        // die('hi i am here 4');
        $_SESSION['errors'] = $result;
        header('Location: ../index.php');
        exit;
    } else {
        // die('hi i am here 5');
        $_SESSION['error_msg'] = 'Failed to register user';
        header('Location: ../index.php');
        exit;
    }
} else {
    die('hi i am here 6');
    $_SESSION['error_msg'] = 'Invalid request';
    header('Location: ../index.php');
    exit;
}
?>
