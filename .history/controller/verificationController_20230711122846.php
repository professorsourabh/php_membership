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
            die('last 4');
            header('Location: ../public/view/verificationPage.php');
            exit;
        } else {
            $_SESSION['error_msg'] = 'Failed to activate account';
            die('last 3');
            header('Location: ../index.php');
            exit;
        }
    }else if(isset($_GET['email'])){
        die('last 1');
        header('Location: ../public/view/forgetPassword.php');
    }
     else {
        $_SESSION['error_msg'] = 'Invalid verification code';
        die('last 2');
        header('Location: ../index.php');
        exit;
    }

}
 else {
    $_SESSION['error_msg'] = 'Invalid request';
    die('last');
    header('Location: ../index.php');
    exit;
}
?>
