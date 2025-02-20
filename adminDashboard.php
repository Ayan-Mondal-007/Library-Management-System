
<?php  
    session_start(); 
    if(!isset($_SESSION['AdminLoginId'])){
    header('location:index.php');
  }

  require('functions.php');
?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Admin Dashboard - Library Management System</title>
  <link rel="stylesheet" href="adminDashboard.css">
</head>
<body>

  <!-- Top bar -->
  <div class="top-bar">
    <div class="logo">
      <img src="Lib_Logo.jpg" alt="Library Logo">
      <span class="library-name">Online Library Management System</span>
    </div>

    <div class="admin-info">
      <span class="admin-name">Welcome, <?php echo $_SESSION['AdminLoginId']; ?> |</span>
      <form method="post">
      <button class="logout-btn" name="adminLogout"><i class="fa-solid fa-right-from-bracket"></i>Log Out</button>
      </form>
    </div>
  </div>

  <!-- Sidebar -->
  <div class="sidebar">
    <ul>
    <li><a href="manageBooks.php">Manage Books</li>
      <li><a href="manageAuthor.php">Manage Authors</a></li>
      <li><a href="manageBorrower.php">Manage Borrowers</a></li>
      <li><a href="issueRecord.php">Issue Records</a></li>
      <li><a href="returnRecord.php">Return Records</a></li>
    </ul>
  </div>

  <!-- Main content area -->
  <div class="main-content">
    <div class="dashboard-header">
      <h1>Admin Dashboard</h1>
      <div class="search-container">
        <input type="text" class="search-box" placeholder="Search...">
        <button class="search-button"><i class="fa-solid fa-magnifying-glass"></i></button>
      </div>
    </div>
    <hr><br>

    <section class="box ">
        <div class="card total-books">
            <h3>Total Books</h3>
            <p><?php echo getTotalBooks(); ?></p>
        </div>
        <div class="card available-books">
            <h3>Available Books</h3>
            <p><?php echo getAvailableBooks(); ?></p>
        </div>
        <div class="card returned-books">
            <h3>Returned Books</h3>
            <p><?php echo getReturnedBooks(); ?></p>
        </div>
        <div class="card issued-books">
            <h3>Issued Books</h3>
            <p><?php echo getIssuedBooks(); ?></p>
        </div>
    </section>
  </div>

  <!-- Admin LogOut -->
   <?php
   if(isset($_POST['adminLogout'])){
    session_destroy();
    header('location:index.php');
   }
   
   ?>

  <script src="https://kit.fontawesome.com/a37be09c82.js" crossorigin="anonymous"></script>
</body>
</html>