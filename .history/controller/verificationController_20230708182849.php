<?php 
session_start();
include('../config_file.php');

$email_verification_code = base64_decode($_GET['code']);

$sql=mysqli_query($conn,"SELECT verificationCode FROM assignment_registration WHERE verificationCode = '$email_verification_code' ");

if($sql){
     
   
    $status = "1";
    $verificationStatus = "verified";
    
    // Prepare the SQL query to update the user's status and verification details
    $sql = "UPDATE assignment_registration SET status = '$status', verified = '$verificationStatus', verified_at = current_timestamp WHERE verificationCode = '$email_verification_code'";
    
    // Execute the query
    if ($conn->query($sql) === TRUE) {
        header("location:../view/verificationPage.html");
        
    } else {
        header("location:../index.html");
        $_SESSION['msg'] ="Your email has been verified ";
        echo "Failed to verify email: " . $conn->error;
    }
    
}
else{

    echo " something went wrong please try aftersome time";
}



?>


