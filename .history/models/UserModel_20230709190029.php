<?php
class UserModelClass
{
    private $pdo;

    public function __construct(PDO $pdo)
    {
        $this->pdo = $pdo;
    }

    public function getUserData($userId)
    {
        $query = "SELECT username, email, password, firstname, lastname FROM assignment_registration WHERE id = :id";
        $stmt = $this->pdo->prepare($query);
        $stmt->bindParam(':id', $userId);
        $stmt->execute();

        return $stmt->fetch(PDO::FETCH_ASSOC);
    }
}
?>
