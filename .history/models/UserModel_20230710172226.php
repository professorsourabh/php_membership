<?php

namespace App\Models;

use mysqli;
use PDO;
include('../config_file.php');
class UserModel
{
    private $pdo;

    public function __construct(PDO $pdo)
    {
        $this->pdo = $pdo;
    }

    public function getUserData($userId)
    {
        $query = "SELECT username, email, password, firstname, lastname FROM membership WHERE id = :id";
        $stmt = $this->pdo->prepare($query);
        $stmt->bindParam(':id', $userId);
        $stmt->execute();

        return $stmt->fetch(PDO::FETCH_ASSOC);
    }


    public function updateUserData()
    {       
        

        $query = "UPDATE membership SET  email=:, password, firstname, lastname FROM assignment_registration WHERE id = :id";
        $stmt = $this->pdo->prepare($query);
        $stmt->bindParam(':id', $userId);
        $stmt->execute();

        return true;
    }
}
?>
