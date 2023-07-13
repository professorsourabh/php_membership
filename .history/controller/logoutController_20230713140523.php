<?php
session_start();
include('../config_file.php');

class LogoutController
{
    public function logoutUser()
    {
        session_destroy();
        header("Location: ../index.php");
        exit;
    }
}

$controller = new LogoutController();
$controller->logoutUser();
?>
