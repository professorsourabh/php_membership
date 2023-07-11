<?php 

if ($_SERVER['REQUEST_METHOD'] === 'POST') {

    // Get the form data
    $email = mysqli_real_escape_string($conn,$_POST['email']); 
    $password=mysqli_real_escape_string($conn,$_POST['password']);


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

    

    


    // If there are no validation errors, proceed with user registration and send activation email
    if (empty($errors)) {

        

            $sql=mysqli_query($conn,"SELECT id FROM users WHERE email='$email' AND password='$password'");
            if(mysqli_num_rows($sql)>0){
                $row=mysqli_fetch_assoc($sql);
                $id=$row['id'];
                $_SESSION['id']=$id;
                 header('Location:http://localhost/pharmacy_panel/dashboard/dashboard.php?');
            }
            else{
                
                header('Location:http://localhost/pharmacy_panel/admin/login.php?');
                $_SESSION['msg']="Email or Password is incorrect";
            }
        
       

    }else{
            
        header('Location:http://localhost/pharmacy_panel/admin/login.php?');
        $_SESSION['msg']="All fields are required!";
     }
}