<?php
session_start();
include('../config_file.php');

class LogoutController
{   //this is logout it destroy all value of session and logout.
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
