<?php 
$serverName='localhost';
$userName='root';
$password='';
$db='form_registration';
$conn=new mysqli($serverName,$userName,$password,$db);

if($conn->connect_error){
    echo "something went wrong please try again!";
}



?>