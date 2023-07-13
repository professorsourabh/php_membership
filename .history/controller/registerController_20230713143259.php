<?php
session_start();

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

include('../config_file.php');
require '../PHPmailer/src/Exception.php';
require '../PHPmailer/src/PHPMailer.php';
require '../PHPmailer/src/SMTP.php';
require '../models/assignment_registration.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $username = mysqli_real_escape_string($conn, $_POST['name']);
    $phone_no = mysqli_real_escape_string($conn, $_POST['phone_no']);
    $first_name = mysqli_real_escape_string($conn, $_POST['first_name']);
    $last_name = mysqli_real_escape_string($conn, $_POST['last_name']);
    $email = mysqli_real_escape_string($conn, $_POST['email']);
    $password = mysqli_real_escape_string($conn, $_POST['password']);
    
    //validate all details and save details in db
    $model = new AssignmentRegistrationModel($conn);
    $result = $model->registerUser($username, $first_name,$last_name,$phone_no, $email, $password);

    
    $encodedVerificationCode = $_SESSION['verificationCode'];;

    if ($result === true) {
        // Initialize PHPMailer
        $mail = new PHPMailer(true);

        try {

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
            $mail->Body = 'Hello ' . $username . ', Please click the following link to activate your account: <br>';
            $urlEnd ='code=' . urlencode($encodedVerificationCode).'&email='.$email;
            $mail->Body .= 'http://localhost/MVC-Assignment/controller/verificationController.php?'.$urlEnd;


            // Send the email
            $mail->send();
            unset($_SESSION['verificationCode']);
            $_SESSION['success_msg']='Email sent to your registered mail! Please verify';
            header('Location: ../index.php');
            exit;
        } catch (Exception $e) {
            $_SESSION['error_msg'] = 'Failed to send activation email: ' . $mail->ErrorInfo;
            header('Location: ../index.php');
            exit;
        }
    } elseif (is_array($result)) {
        
        $_SESSION['error_msg'] = $result;
        header('Location: ../index.php');
        exit;
    } else {
        
        $_SESSION['error_msg'] = 'You have already registered an account!';
        header('Location: ../index.php');
        exit;
    }
} else {
    
    $_SESSION['error_msg'] = 'Invalid request';
    header('Location: ../index.php');
    exit;
}
?>
