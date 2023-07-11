<?php
session_start();

include('../config_file.php');
require '../models/AssignmentLoginModel.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    
    $email = mysqli_real_escape_string($conn, $_POST['email']);
    $password = mysqli_real_escape_string($conn, $_POST['password']);

    $model = new AssignmentLoginModel($conn);
    $result = $model->loginUser($email, $password);
    
    if ($result !== false) {
        $_SESSION['id'] = $result;
        $dashboard=$model->dashboard($_SESSION['id']);
        $_SESSION['userData']=$dashboard;
        header('Location: ../view/dashboard.php');
        // print_r();
        die('hii');
        exit;
    } else {
        $_SESSION['msg'] = "Email or Password is incorrect, or you are not a registered user";
        die('hello');
        header('Location: ../index.php');
        exit;
    }
} else {
    $_SESSION['msg'] = "Invalid request";
    die('hello 2');
    header('Location: ../index.php');
    exit;
}
?>
