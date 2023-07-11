<?php
session_start();

include('../config_file.php');
require '../models/AssignmentLoginModel.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    
    $verify_name = mysqli_real_escape_string($conn, $_POST['verify_name']);
    $password = mysqli_real_escape_string($conn, $_POST['password']);

    $model = new AssignmentLoginModel($conn);
    $result = $model->loginUser($verify_name, $password);
    
    if ($result == true) {
        $_SESSION['id'] = $result;
        $dashboard=$model->dashboard($_SESSION['id']);
        $_SESSION['userData']=$dashboard;
        
        header('Location: ../public/view/dashboard.php');
        // print_r();
        // die('hii');
        exit;
    } else {
        $_SESSION['userData']="Email or Password is incorrect, or you are not a registered user";
        
        header('Location: ../index.php');
        exit;
    }
} else {
    $_SESSION['msg'] = "Invalid request";
    
    header('Location: ../index.php');
    exit;
}
?>
