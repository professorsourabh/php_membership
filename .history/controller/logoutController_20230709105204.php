<?php
session_start();
include('../config_file.php');

class LogoutController
{
    public function logoutUser()
    {
        unset($_SESSION["id"]);
        header("Location: ../login.php");
        exit;
    }
}

$controller = new LogoutController();
$controller->logoutUser();
?>
