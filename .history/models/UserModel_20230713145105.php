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
        $query = "UPDATE membership SET first_name='$firstName',last_name='$lastName', email='$email', password=md5('$password'),phone_no='$phone_no'  WHERE id = $id";
        if ($this->conn->query($query) === TRUE) {
            $sql=mysqli_query($this->conn,"SELECT * From membership Where id ='$id'");
            if ($sql->num_rows > 0) {
              $row = $sql->fetch_assoc();
                return $row;
            
            }
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
                $row = $result->fetch_assoc();
                $_SESSION['msg'] = 'We have sent an email to your registered mail !!';
                $_SESSION['id']=$row['id'];
                
                return true;
            }
            
            return false;
        } else {
            
            // Return the validation errors
            return $errors;
        }



    }
    

    
    public function checkPassword($password,$id){

         // Perform validation and error handling
         $errors = array();   

         if (empty($password)) {
            $errors[] = 'Password is required';
        }
        
        
        if(empty($errors)){
            $sql="UPDATE membership SET password=md5('$password')";
            $result = $this->conn->query($sql);
            if($result == true){
               
                return true;
            }
        }else {
            
            // Return the validation errors
            return $errors;
        }
        
    }
    
 
}
?>
