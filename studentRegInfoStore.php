<?php
require('databaseConnection.php');

/* For Storing Registration Data */ 

if(isset($_POST['signup']))
{
    
    $firstName = $_POST['firstName'];
    $lastName = $_POST['lastName'];
    $stream = $_POST['stream'];
    $rollNum = $_POST['rollNum'];
    $email = $_POST['email'];
    $password = $_POST['password'];
}
$query = "INSERT INTO registration_info(firstName,lastName, stream, rollNum, email, password) VALUES ('$firstName','$lastName', '$stream', '$rollNum', '$email','$password')";

$request = mysqli_query($con,$query);

if($request){
    echo("<script>
        alert('Student Registered Successfully!');
        window.location.href = 'index.php';
    </script>");
   
}else{
    echo("Error! Data Not Saved!!");
}

?>