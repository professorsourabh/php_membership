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

        
        
        // Validate email
        if (empty($email)) {
            $errors[] = 'Email is required';
        } elseif (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
            $errors[] = 'Invalid email format';
        }

        
        // If there are no validation errors, proceed with user registration and send activation email
        if (empty($errors)) {
            
              // check whether the email is registered or not
            $sql = "SELECT id FROM membership WHERE email='$email'";
            $result = $this->conn->query($sql);
            if ($result->num_rows > 0) {
                $_SESSION['msg'] = 'We have sent an email to your registered mail !!';
                
                return true;
            }

            return false;
        } else {
            // Return the validation errors
            return $errors;
        }
    }
    // Generate a verification code
   
    
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
