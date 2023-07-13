<?php



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

    public function checkRegisterUser($email)
    {
        // Perform validation and error handling
        $errors = array();

        // Validate username
        if (empty($username && $phone_no && $first_name)) {
            $errors['msg'] = 'field is required';
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
        

        // If there are no validation errors, proceed with user registration and send activation email
        if (empty($errors)) {
            $status = '0';

            // Generate a verification code
           
            
            $verificationCode = $this->generateVerificationCode();
            $encodedVerificationCode = $verificationCode;

            // Save field data in the database
            $sql = "SELECT id FROM membership WHERE email='$email'";
            $result = $this->conn->query($sql);
            if ($result->num_rows > 0) {
                $_SESSION['msg'] = 'You have already registered an account!';
                return false;
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
    
    public function verifyUser($email)
{
    
    $email = mysqli_real_escape_string($this->conn, $email);

    // echo $verificationCode;
    
    // Find the user with the given verification code
    $sql = "SELECT id FROM membership WHERE  email='$email'";
    $result = $this->conn->query($sql);

    if ($result->num_rows > 0) {
        // die();
        // Update the user's verification status
        $sql = "UPDATE membership SET verify_status='1' WHERE email ='$email'";
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
