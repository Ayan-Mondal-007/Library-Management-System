<?php

require('databaseConnection.php');

/* For SignIn Purpose  */ 

if(isset($_POST['login'])){
    $loginUsername = $_POST['loginUsername'];
    $loginPassword = $_POST['loginPassword'];

    $query = "SELECT * FROM `registration_info` WHERE `email`='$loginUsername' AND `password`='$loginPassword'";
    $result = mysqli_query($con,$query);

    if(mysqli_num_rows($result) == 1){

        session_start();
        $_SESSION['StudentLoginId'] = $loginUsername;
        header('location:afterLogin.php');
    }else{
        echo(
            "<script>
            alert('Incorrect Email Or Password!');
            window.location.href = 'studentRegLog.php';
            </script>"
        );
    }
}


?>