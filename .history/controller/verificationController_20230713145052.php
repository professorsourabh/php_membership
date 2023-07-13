<?php
session_start();

include('../config_file.php');
require '../models/assignment_registration.php';
require '../models/UserModel.php';
// For Email Verification
if ($_SERVER['REQUEST_METHOD'] === 'GET') {
    if (isset($_GET['code']) && isset($_GET['email'])) {
        $verificationCode = mysqli_real_escape_string($conn,$_GET['code']);
        $email=mysqli_real_escape_string($conn,$_GET['email']);
        // Perform verification and verify user and change status in db
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
    }else if(isset($_GET['email']) && isset($_GET['id'])){
        header('Location: ../public/view/forgetPassword.php');
        exit;
    }
     else {
        $_SESSION['error_msg'] = 'Invalid verification code';
        die('last 2');
        header('Location: ../index.php');
        exit;
    }

}
// for forgetPassword verification 
else if($_SERVER['REQUEST_METHOD'] === 'POST') {

    if(isset($_POST['password']) && isset($_POST['confirm_password'])) {
    

        
        $password=mysqli_real_escape_string($conn,$_POST['password']);
        $confirm_password=mysqli_escape_string($conn,$_POST['confirm_password']);
        $id=mysqli_escape_string($conn,base64_decode($_POST['id']));
    
        if($password === $confirm_password){
            $model=new UserModel($conn);
            $result=$model->checkPassword($password,$id);
            if($result){
                $_SESSION['success_msg'] = 'Your Password is successfully updated !';
                header('Location: ../index.php');
            }
        }
    }
    }





 else {
    header('Location: ../index.php');
    exit;
}
?>
