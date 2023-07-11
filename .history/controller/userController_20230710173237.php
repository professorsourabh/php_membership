<?php

namespace App\Controllers;

use App\Models\UserModel;

class UserController
{
    private $userModel;

    public function __construct(UserModel $userModel)
    {
        $this->userModel = $userModel;
    }

    public function displayUserProfile($userId)
    {
        $userData = $this->userModel->getUserData($userId);

        // Pass the data to the view
        include '../view/dashboard.php';
    }

    public function updateUserProfile()
    {
        include '../config_file.php';
        $firstName = mysqli_escape_string($conn, $_POST['first_name']);
        $lastName = mysqli_escape_string($conn, $_POST['last_name']);
        $email = mysqli_escape_string($conn, $_POST['email']);

        $userData = $this->userModel->updateUserData($firstName, $lastName, $email);

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
}
?>
