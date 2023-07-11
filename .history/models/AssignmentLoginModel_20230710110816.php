<?php

class AssignmentLoginModel
{
    private $conn;

    public function __construct($conn)
    {
        $this->conn = $conn;
    }

    public function loginUser($verify_name, $password)
    {
        // Perform validation and error handling
        $errors = array();

        // Validate email
        if (empty($verify_name)) {
            $errors[] = 'Email is required';
        } elseif (!filter_var($verify_name, FILTER_VALIDATE_EMAIL)) {
            $errors[] = 'Invalid email format';
        }

        // Validate password
        if (empty($password)) {
            $errors[] = 'Password is required';
        }

        // If there are no validation errors, proceed with user login
        if (empty($errors)) {
            $sql = "SELECT id FROM membership WHERE email='$email' AND password=md5('$password') AND verify_status='1'";
            $result = $this->conn->query($sql);

            if ($result->num_rows > 0) {
                $row = $result->fetch_assoc();
                $id = $row['id'];
                return $id;
            } else {
                return false;
            }
        } else {
            return false;
        }
    }


    public function dashboard($current_id){

        // $current_id=$_SESSION['id'];
        $sql=mysqli_query($this->conn,"SELECT * From assignment_registration Where id ='$current_id'");
        if ($sql->num_rows > 0) {
          $row = $sql->fetch_assoc();
        //   $userName=$row['username'];
        //   $firstName=$row['firstname'];
        //   $lastname=$row['lastname'];
        //   $email=$row['email'];
        //   $password=$row['password'];
          return $row;
        
        }
    }

}
?>
