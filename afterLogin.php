<?php
session_start();
if(!isset($_SESSION['StudentLoginId'])){
    header('location:index.php');
}
?>
    <!-- Main Starts From Here -->

    <!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Library Management Systeem</title>
    <link rel="stylesheet" href="afterLogin.css">
</head>
<body>
    <header>
        <div class="top-header">
            <div class="logo-container">
                <img src="Lib_Logo.jpg" alt="Library Logo" class="logo">
            </div>
            <div class="library-info">
                <h1 class="library-name">ONLINE LIBRARY</h1>
                <span class="library-subtitle">MANAGEMENT SYSTEM</span>
            </div>
            <div class="header-actions">
                <div class="user-bar">
                    <form method="post">
                    <button class="logout-button" name="logout"><i class="fa-solid fa-right-from-bracket"></i></button>
                    </form>
                    <p><?php echo $_SESSION['StudentLoginId']; ?></p>
                </div>
            </div>
        </div>
        <nav class="main-nav">
            <ul>
                <li><a href="#">HOME</a></li>
                <li><a href="books.php">BOOKS</a></li>
                <li><a href="about.php">ABOUT</a></li>
                <li><a href="feedback.php">FEEDBACK</a></li>
            </ul>
        </nav>
    </header>
    <section>
        <div class="time-box">
            <h1>Welcome to the Library</h1><br>
            <h1>Opens at: 09:00am</h1><br>
            <h1>Closes at: 08:00pm</h1><br>

        </div>
    </section>
    <footer>
        <p>&copy; 2024 University Library. All rights reserved.</p>
        <p>Contact: info@universitylibrary.com | Phone: (+91) 786-837-7627</p>
        <p>Address: 123 Library Block, University</p>
    </footer>

<?php
if(isset($_POST['logout'])){
    session_destroy();
    header('location:index.php');
}
?>
    
    
    

    <script src="https://kit.fontawesome.com/a37be09c82.js" crossorigin="anonymous"></script>
</body>
</html>
</body>
</html>