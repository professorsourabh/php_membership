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
    
    // Find the user with the given verification code
    $sql = "SELECT id FROM membership WHERE verificationCode='$verificationCode' and email='$email'";
    $result = $this->conn->query($sql);

    if ($result->num_rows > 0) {
        // die();
        // Update the user's verification status
        $sql = "UPDATE membership SET verify_status='1' WHERE verificationCode='$verificationCode'";
        if ($this->conn->query($sql) === TRUE) {
            return true;
        } else {
            // die('hii');
            return false;
        }
    } else {
        // die('hii 2');
        return false;
    }
}
}
?>
