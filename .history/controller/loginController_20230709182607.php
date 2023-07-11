<?php
session_start();

include('../config_file.php');
require '../models/AssignmentLoginModel.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $email = mysqli_real_escape_string($conn, $_POST['email']);
    $password = mysqli_real_escape_string($conn, $_POST['password']);

    $model = new AssignmentLoginModel($conn);
    $result = $model->loginUser($email, $password);
    $id = $model->SessionID($email, $password);
    if ($result !== false) {
        $_SESSION['id'] = $id;
        header('Location: ../view/dashboard.php');
        exit;
    } else {
        $_SESSION['msg'] = "Email or Password is incorrect, or you are not a registered user";
        header('Location: ../login.php');
        exit;
    }
} else {
    $_SESSION['msg'] = "Invalid request";
    header('Location: ../login.php');
    exit;
}
?>
