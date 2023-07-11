<?php
class AssignmentLoginModel
{
    private $conn;

    public function __construct($conn)
    {
        $this->conn = $conn;
    }

    public function loginUser($email, $password)
    {
        // Perform validation and error handling
        $errors = array();

        // Validate email
        if (empty($email)) {
            $errors[] = 'Email is required';
        } elseif (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
            $errors[] = 'Invalid email format';
        }

        // Validate password
        if (empty($password)) {
            $errors[] = 'Password is required';
        }

        // If there are no validation errors, proceed with user login
        if (empty($errors)) {
            $sql = "SELECT id FROM assignment_registration WHERE email='$email' AND password='$password' AND verified='verified'";
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
}
?>
