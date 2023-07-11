<?php
session_start();


    if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    {
        include '../config_file.php';
        $firstName = mysqli_escape_string($conn, $_POST['first_name']);
        $lastName = mysqli_escape_string($conn, $_POST['last_name']);
        $email = mysqli_escape_string($conn, $_POST['email']);
        $phone_no=mysqli_escape_string($conn,$_POST['phone_no']);
        $password=mysqli_escape_string($conn,$_POST['password']);
        $id=mysqli_escape_string($conn,base64_decode($_POST['id']));
        $userData = $this->userModel->updateUserData($firstName, $lastName, $email,$phone_no,$password);

        if ($userData === true) {
            // Success message
            echo "<script>alert('User data updated successfully.');</script>";
            header('Location: ../public/view/dashboard.php');
            exit;
        } else {
            // Error message
            echo "<script>alert('Failed to update user data. Please try again.');</script>";
            header('Location: ../public/view/dashboard.php');
            exit;
        }
    }
}else {
    $_SESSION['msg'] = "Invalid request";
    
    header('Location: ../public/view/dashboard.php');
    exit;
}
?>
