<?php
class AssignmentRegistrationModel
{
    private $conn;

    public function __construct($conn)
    {
        $this->conn = $conn;
    }

    public function registerUser($username, $phone_no,  $email, $password)
    {
        // Perform validation and error handling
        $errors = array();

        // Validate username
        if (empty($username && $phone_no)) {
            $errors[] = 'field is required';
        }

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

        // Check if the user is already registered
        $sql = "SELECT id FROM assignment_registration WHERE email='$email'";
        $result = $this->conn->query($sql);
        if ($result->num_rows > 0) {
            $_SESSION['msg'] = 'You have already registered an account!';
            return false;
        }

        // If there are no validation errors, proceed with user registration and send activation email
        if (empty($errors)) {
            $status = '0';

            // Generate a verification code
           
            
            $verificationCode = $this->generateVerificationCode();
            $encodedVerificationCode = $verificationCode;

            // Save field data in the database
            $sql = "INSERT INTO membership (name, phone_no, email, password, status, verificationCode, verified) VALUES ('$username', '$phone_no', '$email', md5('$password'), $status, '$verificationCode', 'not verified')";
            if ($this->conn->query($sql) === TRUE) {
                $_SESSION['verificationCode']=$encodedVerificationCode;
                return true;
            }

            return false;
        } else {
            // Return the validation errors
            return $errors;
        }
    }

    public function generateVerificationCode($length = 10)
    {
        $characters = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ#$&';
        $code = '';
        for ($i = 0; $i < $length; $i++) {
            $code .= $characters[rand(0, strlen($characters) - 1)];
        }
        return $code;
    }

    public function verifyUser($verificationCode,$email)
{
    $verificationCode = mysqli_real_escape_string($this->conn, $verificationCode);
    $email = mysqli_real_escape_string($this->conn, $email);

    // echo $verificationCode;
    // die();
    // Find the user with the given verification code
    $sql = "SELECT id FROM assignment_registration WHERE verificationCode='$verificationCode' and email='$email'";
    $result = $this->conn->query($sql);

    if ($result->num_rows > 0) {
        // Update the user's verification status
        $sql = "UPDATE assignment_registration SET verified='verified' WHERE verificationCode='$verificationCode'";
        if ($this->conn->query($sql) === TRUE) {
            return true;
        } else {
            die('hii');
            return false;
        }
    } else {
        die('hii 2');
        return false;
    }
}

}
?>
