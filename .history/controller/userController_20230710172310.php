<?php

namespace App\Controllers; 
use App\Models\UserModel;
include('../config_file.php');
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


    public function updateUserProfile(){
        $firstName=mysqli_escape_string($conn,$_POST['first_name']);
        $lastName=mysqli_escape_string($this->nn,$_POST['last_name']);
        $email=mysqli_escape_string($this->Conn,$_POST['email']);
        $userData=$this->updateUserData($userId);
        include '../view/dashboard.php';
    }
}
?>
