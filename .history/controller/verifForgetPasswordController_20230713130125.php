<?php 

session_start();

include('../config_file.php');
require '../models/assignment_registration.php';
require '../models/UserModel.php';

($_SERVER['REQUEST_METHOD'] === 'Post') {

if(isset($_POST['password']) && isset($_POST['confirm_password'])) {

    $password=mysqli_real_escape_string($conn,$_POST['password']);
    $confirm_password=mysqli_escape_string($conn,$_POST['confirm_password']);
    $id=mysqli_escape_string($conn,base64_decode($_POST['id']));

    if($password === $confirm_password){

        $model=new UserModel($conn);
        $result=$model->checkPassword($password,$id);
    }
}
}