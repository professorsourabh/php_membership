<?php


use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

include('../config_file.php');
require '../PHPmailer/src/Exception.php';
require '../PHPmailer/src/PHPMailer.php';
require '../PHPmailer/src/SMTP.php';

// Check if the form is submitted
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Get the form data
    $username = $_POST['username'];
    $firstname=$_POST['firstname'];
    $lastname=$_POST['lastname'];
    $email = $_POST['email'];
    $password = $_POST['password'];


    // Perform validation and error handling
    $errors = array();

    // Validate username
    if (empty($username && $lastname && $firstname)) {
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

    

    


    // If there are no validation errors, proceed with user registration and send activation email
    if (empty($errors)) {

        $status='0';
       

        // Generate a verification code
        function generateVerificationCode($length = 10) {
            $characters = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';
            $code = '';
            for ($i = 0; $i < $length; $i++) {
                $code .= $characters[rand(0, strlen($characters) - 1)];
            }
            return $code;
        }

        $verificationCode = generateVerificationCode();
        $encodedVerificationCode=base64_encode($verificationCode);
         // save field data in database 
         $sql = "INSERT INTO assignment_registration (username,lastname,firstname,email,password,status,verificationCode,verified) VALUES ('$username', '$lastname', '$firstname','$email','$password',$status,'$verificationCode','not verified')";
        
         if ($conn->query($sql) === TRUE) {
            
          }

        $message = 'Hello, Please click the following link to activate your account: ' . PHP_EOL;
        $message .= 'http://localhost/MVC-Assignment/controller/verificationController.php?code=' . $encodedVerificationCode;

        // Initialize PHPMailer
        $mail = new PHPMailer(true);

        try {
            // Configure SMTP settings
            $mail->isSMTP();
            $mail->Host = 'smtp.gmail.com';
            $mail->Port = 465;
            $mail->SMTPAuth = true;
            $mail->SMTPSecure = 'ssl';
            $mail->Username = 'ssingh30126@gmail.com';
            $mail->Password = 'ddjdjokukrbdhuro';

            // Set email properties
            $mail->setFrom('ssingh30126@gmail.com');
            $mail->addAddress($email);
            $mail->isHTML(true);
            $mail->Subject = 'Account Activation';
            $mail->Body = $message;

            // Send the email
            $mail->send();

            echo "<script>
            alert('Email sent');
            document.location.href='index.html';
            </script>";
            exit;
        } catch (Exception $e) {
            echo 'Failed to send activation email: ' . $mail->ErrorInfo;
        }
    } else {
        // Display the errors
        foreach ($errors as $error) {
            echo $error . '<br>';
        }
    }
}
?>
