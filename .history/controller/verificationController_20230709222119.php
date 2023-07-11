<?php
session_start();

include('../config_file.php');
require '../models/assignment_registration.php';

if ($_SERVER['REQUEST_METHOD'] === 'GET') {
    if (isset($_GET['code']) && isset($_GET['email'])) {
        $verificationCode = $_GET['code'];

        // Perform verification
        $model = new AssignmentRegistrationModel($conn);
        $result = $model->verifyUser($verificationCode);

        if ($result === true) {
            $_SESSION['success_msg'] = 'Account activated successfully';
            header('Location: ../view/verificationPage.php');
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
} else {
    $_SESSION['error_msg'] = 'Invalid request';
    header('Location: ../index.php');
    exit;
}
?>
