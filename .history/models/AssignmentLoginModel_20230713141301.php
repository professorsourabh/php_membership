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
            //check login credentials in db
            $sql = "SELECT id FROM membership WHERE (email='$verify_name' or name='$verify_name') AND password=md5('$password') AND verify_status='1'";
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

//this function is for show data of user on dashboard
    public function dashboard($current_id){
        
        $sql=mysqli_query($this->conn,"SELECT * From membership Where id ='$current_id'");
        if ($sql->num_rows > 0) {
          $row = $sql->fetch_assoc();
            return $row;
        
        }
    }

}
?>
