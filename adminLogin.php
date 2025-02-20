<?php   
    require('databaseConnection.php')
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Student Login</title>
    <link rel="stylesheet" href="studentRegLog.css">
</head>
<body>
    <div class="main">
        <div class="container" id="form-container">
            <!-- Admin Login Form -->
            <div id="login-form" style="display: block;">
                <h2>Admin Login Panel</h2>
                <form method="post" >
                    <label for="loginUsername">Admin Username</label>
                    <span style="color: red;"></span>
                    <input type="text" name="username" placeholder="SamAsh123@gmail.com">

                    <label for="loginPassword">Admin Password</label>
                    <span style="color: red;" ></span>
                    <input type="password" name="password" placeholder="Password">

                    <button type="submit" name="login">Login</button>
                </form>
            <div>
        <div>
    </div>

    <?php
    if(isset($_POST['login'])){

        $adminUsername = $_POST['username'];
        $adminPassword = $_POST['password'];
        
        $query = "SELECT * FROM `admin_info` WHERE `Admin_Username`='$adminUsername' AND `Admin_Password`='$adminPassword'";
        $result = mysqli_query($con,$query);

        if(mysqli_num_rows($result) == 1){
            session_start();
            $_SESSION['AdminLoginId'] = $adminUsername;
            header('location:adminDashboard.php');
        }else{
            echo(
                "<script>
                alert('Incorrect Admin Username Or Password!');
                window.location.href = '#';
                </script>"
            );
    }
}
    
    
    ?>
</body>
</html>