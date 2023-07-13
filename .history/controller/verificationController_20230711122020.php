<?php
session_start();

include('../config_file.php');
require '../models/assignment_registration.php';

if ($_SERVER['REQUEST_METHOD'] === 'GET') {
    if (isset($_GET['code']) && isset($_GET['email'])) {
        $verificationCode = mysqli_real_escape_string($conn,$_GET['code']);
        $email=mysqli_real_escape_string($conn,$_GET['email']);
        // Perform verification
        $model = new AssignmentRegistrationModel($conn);
        $result = $model->verifyUser($verificationCode,$email);

        if ($result === true) {
            $_SESSION['success_msg'] = 'Account activated successfully';
            header('Location: ../public/view/verificationPage.php');
            exit;
        } else {
            $_SESSION['error_msg'] = 'Failed to activate account';
            header('Location: ../index.php');
            exit;
        }
    } else {
        $_SESSION['error_msg'] = 'Invalid verification code';
        header('Location: ../index.php');
        exit;
    }

}else if(isset($_GET['email'])){
    header('Location: ../public/view/forgetPassword.php');
}
 else {
    $_SESSION['error_msg'] = 'Invalid request';
    header('Location: ../index.php');
    exit;
}
?>
