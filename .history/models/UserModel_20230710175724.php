<?php

namespace App\Models;

use mysqli;
use PDO;

class UserModel
{
    private $conn;

    public function __construct($conn)
    {
        $this->conn = $conn;
    }


    

    public function updateUserData($id,$firstName, $lastName, $email,$phone_no,$password)
    {       
        

        $query = "UPDATE membership SET first_name='$firstName',last_name='$lastName', email='$email', password='$password',phone_no='$phone_no'  WHERE id = $id";
        if ($this->conn->query($query) === TRUE) {

        return true;
    }else{
        return false;
    }
    }
}
?>
