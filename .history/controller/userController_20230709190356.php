<?php

namespace App\Controllers; 

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
}
?>
