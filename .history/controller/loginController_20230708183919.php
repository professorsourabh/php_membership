<?php 

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Get the form data
   
    $email = $_POST['email'];
    $password = $_POST['password'];


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

       

    }
}