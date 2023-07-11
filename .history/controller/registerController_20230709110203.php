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
    $username = mysqli_real_escape_string($conn, $_POST['username']);
    $firstname = mysqli_real_escape_string($conn, $_POST['firstname']);
    $lastname = mysqli_real_escape_string($conn, $_POST['lastname']);
    $email = mysqli_real_escape_string($conn, $_POST['email']);
    $password = mysqli_real_escape_string($conn, $_POST['password']);

    $model = new AssignmentRegistrationModel($conn);
    $result = $model->registerUser($username, $lastname, $firstname, $email, $password);

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
            $mail->Body = 'Hello ' . $firstname . ', Please click the following link to activate your account: <br>';
            $mail->Body .= 'http://localhost/MVC-Assignment/controller/verificationController.php?code=' . $encodedVerificationCode;
            // $mail->Body .= 'http://localhost/MVC-Assignment/controller/verificationController.php?code=' . $encodedVerificationCode;


            // Send the email
            $mail->send();

            $_SESSION['success_msg'] = 'Email sent';
            header('Location: ../index.php');
            exit;
        } catch (Exception $e) {
            $_SESSION['error_msg'] = 'Failed to send activation email: ' . $mail->ErrorInfo;
            header('Location: ../index.php');
            exit;
        }
    } elseif (is_array($result)) {
        $_SESSION['errors'] = $result;
        header('Location: ../index.php');
        exit;
    } else {
        $_SESSION['error_msg'] = 'Failed to register user';
        header('Location: ../index.php');
        exit;
    }
} else {
    $_SESSION['error_msg'] = 'Invalid request';
    header('Location: ../index.php');
    exit;
}
?>
