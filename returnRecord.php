
<?php  
    session_start(); 

    if(!isset($_SESSION['AdminLoginId'])){
    header('location:index.php');
}

require('databaseConnection.php');

?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Admin Dashboard - Library Management System</title>
  <link rel="stylesheet" href="adminDashboard.css">
  <link rel="stylesheet" href="manageBooks.css">
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
        <li><a href="adminDashboard.php">Home</a></li>
        <li><a href="manageBooks.php">Manage Books</a></li>
        <li><a href="manageAuthor.php">Manage Authors</a></li>
        <li><a href="manageBorrower.php">Manage Borrowers</a></li>
        <li><a href="issueRecord.php">Issue Records</a></li>
        <li style="background-color:#3a4f5d;font-size:20px"><a href="returnRecord.php">Return Records</a></li>
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

  <div class="action-buttons" style="display: flex; justify-content: space-between; gap: 10px;">
  <h1>Return Records</h1>
  </div>

  <section class="box" id="book-section">

<?php

$fetchReturnRecords = "SELECT * FROM returned_records";
$result = mysqli_query($con, $fetchReturnRecords);

if(mysqli_num_rows($result) > 0):
?>

    <table class="books-table">
        <thead>
            <tr>
                <th>Record ID</th>
                <th>Book ID</th>
                <th>Borrower Name</th>
                <th>Book Title</th>
                <th>Borrow Date</th>
                <th>Returning Date</th>
            </tr>
        </thead>
        <tbody>
        <?php while ($row = mysqli_fetch_assoc($result)): ?>
          <tr>
          <td><?php echo $row['record_id']; ?></td>
            <td><?php echo $row['book_id']; ?></td>
            <td><?php echo $row['borrower_name']; ?></td>
            <td><?php echo $row['book_title']; ?></td>
            <td><?php echo $row['issue_date']; ?></td>
            <td><?php echo $row['return_date']; ?></td>
          </tr>
          <?php endwhile; ?>
        </tbody>
    </table>
    <?php else: ?>
        <p>No books found in the library.</p>
    <?php endif; ?>
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