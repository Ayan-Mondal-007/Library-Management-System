<?php  
    session_start(); 

    if(!isset($_SESSION['AdminLoginId'])){
    header('location:index.php');
}
?>
<?php
// Include the database connection file
require('databaseConnection.php');
require('deleteBook.php');

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
        <li style="background-color:#3a4f5d;font-size:20px"><a href="manageBooks.php" >Manage Books</a></li>
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
      <form method="post">
      <input type="text" class="search-box" placeholder="Search..." name="search" required>
      <button class="search-button" type="submit" name="submit" style="z-index:1;"><i class="fa-solid fa-magnifying-glass"></i></button>
      </form>
    </div>
  </div>
  
  <hr><br>


  <div class="action-buttons" style="display: flex; justify-content: space-between; gap: 10px;">
  <h1>Library Books</h1>
    <form action="addBooks.php" method="post">
    <button class="btn" id="addBookBtn" name="addBooks"><i class="fa-solid fa-plus" style="margin-right:5px"></i>Add Book</button>
    </form>

  </div>

  <section class="box" id="book-section">

  <?php 
  
  if(isset($_POST['submit'])){
    $searchTerm = mysqli_real_escape_string($con, $_POST['search']);
    $res = mysqli_query($con, "SELECT * FROM books WHERE book_title LIKE '%$searchTerm%'");

    if(mysqli_num_rows($res) == 0){
      echo "<p>No book found with such name.</p>";
    } else {
      echo "<table class='books-table'>
              <thead>
                <tr>
                  <th>Book ID</th>
                  <th>Title</th>
                  <th>Author</th>
                  <th>Genre</th>
                  <th>Isbn</th>
                  <th>Publisher</th>
                  <th>Publishing Year</th>
                  <th>Description</th>
                  <th>Status</th>
                  <th>Actions</th>
                </tr>
              </thead>
              <tbody>";
      
      while ($row = mysqli_fetch_assoc($res)) {
        echo "<tr>
                <td>{$row['id']}</td>
                <td>{$row['book_title']}</td>
                <td>{$row['author']}</td>
                <td>{$row['genre']}</td>
                <td>{$row['isbn']}</td>
                <td>{$row['publisher']}</td>
                <td>{$row['pub_year']}</td>
                <td class='max'>{$row['description']}</td>
                <td>{$row['status']}</td>
                <td>
                  <form action='editBook.php' method='post' style='margin-bottom:4px'>
                    <input type='hidden' name='book_id' value='{$row['id']}'>
                    <button class='edit-btn' name='updateBook'><i class='fa-solid fa-pen-to-square'></i>Edit</button>
                  </form>
                  <form action='deleteBook.php' method='post'>
                    <input type='hidden' name='book_id' value='{$row['id']}'>
                    <button class='delete-btn' name='deleteBook'><i class='fa-solid fa-trash'></i>Delete</button>
                  </form>
                </td>
              </tr>";
      }
      echo "</tbody></table>";
    }

  } else {
    // Default display of all books
    $res = mysqli_query($con, "SELECT * FROM books");

    if (mysqli_num_rows($res) > 0) {
      echo "<table class='books-table'>
              <thead>
                <tr>
                  <th>Book ID</th>
                  <th>Title</th>
                  <th>Author</th>
                  <th>Genre</th>
                  <th>Isbn</th>
                  <th>Publisher</th>
                  <th>Publishing Year</th>
                  <th>Description</th>
                  <th>Status</th>
                  <th>Actions</th>
                </tr>
              </thead>
              <tbody>";
      
      while ($row = mysqli_fetch_assoc($res)) {
        echo "<tr>
                <td>{$row['id']}</td>
                <td>{$row['book_title']}</td>
                <td>{$row['author']}</td>
                <td>{$row['genre']}</td>
                <td>{$row['isbn']}</td>
                <td>{$row['publisher']}</td>
                <td>{$row['pub_year']}</td>
                <td class='max'>{$row['description']}</td>
                <td>{$row['status']}</td>
                <td>
                  <form action='editBook.php' method='post' style='margin-bottom:4px'>
                    <input type='hidden' name='book_id' value='{$row['id']}'>
                    <button class='edit-btn' name='updateBook'><i class='fa-solid fa-pen-to-square'></i>Edit</button>
                  </form>
                  <form action='deleteBook.php' method='post'>
                    <input type='hidden' name='book_id' value='{$row['id']}'>
                    <button class='delete-btn' name='deleteBook'><i class='fa-solid fa-trash'></i>Delete</button>
                  </form>
                </td>
              </tr>";
      }
      echo "</tbody></table>";
    } else {
      echo "<p>No books found in the library.</p>";
    }
  }
  ?>
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
