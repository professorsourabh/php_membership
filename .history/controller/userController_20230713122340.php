<?php
session_start();

require('../models/UserModel.php');
    if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    {
        include '../config_file.php';
        $firstName = mysqli_escape_string($conn, $_POST['first_name']);
        $lastName = mysqli_escape_string($conn, $_POST['last_name']);
        $email = mysqli_escape_string($conn, $_POST['email']);
        $phone_no=mysqli_escape_string($conn,$_POST['phone_no']);
        $password=mysqli_escape_string($conn,$_POST['password']);
        $id=mysqli_escape_string($conn,base64_decode($_POST['id']));
        $userModel = new UserModel($conn);
        $userData = $userModel->updateUserData($id,$firstName, $lastName, $email,$phone_no,$password);

        if ($userData === true) {
            // Success message
            $_SESSION['success_msg']='User data updated successfully.';
            header('Location: ../public/view/dashboard.php');
            exit;
        } else {
            // Error message
            $_SESSION['error_msg']='Failed to update user data. Please try again.';
            header('Location: ../public/view/dashboard.php');
            exit;
        }
    }
}else {
    $_SESSION['error_msg'] = "Invalid request";
    
    header('Location: ../public/view/dashboard.php');
    exit;
}
?>
