<?php

namespace App\Models;

use mysqli;
use PDO;

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


    public function updateUserData($firstName, $lastName, $email,$phone_no,$password)
    {       
        

        $query = "UPDATE membership SET  email=:, password, firstname, lastname FROM assignment_registration WHERE id = :id";
        $stmt = $this->pdo->prepare($query);
        $stmt->bindParam(':id', $password);
        $stmt->bindParam(':id', $firstName);
        $stmt->bindParam(':id', $lastName);
        $stmt->bindParam(':id', $email);
        $stmt->bindParam(':id', $phone_no);

        $stmt->execute();

        return true;
    }
}
?>
