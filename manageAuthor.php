<!-- <?php  
session_start(); 

if(!isset($_SESSION['AdminLoginId'])){
    header('location:index.php');
}
?> -->
<?php
// Include the database connection file
require('databaseConnection.php');


// Fetch all books categorized by author
$query = "SELECT * FROM books ORDER BY author";
$result = mysqli_query($con, $query);

$books_by_author = [];

// Group books by author name
while ($row = mysqli_fetch_assoc($result)) {
    $author_name = $row['author'];
    $books_by_author[$author_name][] = $row;
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Dashboard - Library Management System</title>
    <link rel="stylesheet" href="manageAuthor.css">
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
        <li style="background-color:#3a4f5d;font-size:20px"><a href="manageAuthor.php">Manage Authors</a></li>
        <li><a href="manageBorrower.php">Manage Borrowers</a></li>
        <li><a href="issueRecord.php">Issue Records</a></li>
        <li><a href="returnrecord.php">Return Records</a></li>
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

  <!-- Add and View Buttons -->
  <div class="action-buttons" style="display: flex; justify-content: space-between; gap: 10px;">
    <h1>Manage Books By Author</h1>
    <form action="addBooks.php" method="post">
      <button class="btn" id="addBookBtn" name="addBooks"><i class="fa-solid fa-plus" style="margin-right:5px"></i>Add Book</button>
    </form>
  </div>

  <!-- Section where the table is displayed -->
  <section class="box" id="book-section">
    <?php foreach ($books_by_author as $author_name => $books): ?>
        <div class="author-section">
            <h2>AUTHOR: <?php echo htmlspecialchars($author_name); ?></h2>
            <table class="books-table">
                <thead>
                    <tr>
                        <th>Book ID</th>
                        <th>Title</th>
                        <th>Genre</th>
                        <th>ISBN</th>
                        <th>Publisher</th>
                        <th>Year</th>
                        <th>Description</th>
                        <th>Status</th>
                        <th>Actions</th>
                    </tr>
                </thead>
                <tbody>
                    <?php foreach ($books as $book): ?>
                    <tr>
                        <td><?php echo $book['id']; ?></td>
                        <td><?php echo htmlspecialchars($book['book_title']); ?></td>
                        <td><?php echo htmlspecialchars($book['genre']); ?></td>
                        <td><?php echo htmlspecialchars($book['isbn']); ?></td>
                        <td><?php echo htmlspecialchars($book['publisher']); ?></td>
                        <td><?php echo htmlspecialchars($book['pub_year']); ?></td>
                        <td class="max"><?php echo htmlspecialchars($book['description']); ?></td>
                        <td><?php echo htmlspecialchars($book['status']); ?></td>
                        <td>
                            <form action="editBook.php" method="post" style="margin-bottom:4px">
                            <input type="hidden" name="book_id" value="<?php echo $book['id']; ?>">
                            <button class="edit-btn" name="updateBook"><i class="fa-solid fa-pen-to-square"></i>Edit</button>
                            </form>
                            <form action="deleteBook.php" method="post">
                            <input type="hidden" name="book_id" value="<?php echo $book['id']; ?>">
                            <button class="delete-btn" name="deleteBook"><i class="fa-solid fa-trash"></i>Delete</button>
                            </form>
                        </td>
                    </tr>
                    <?php endforeach; ?>
                </tbody>
            </table>
        </div>
    <?php endforeach; ?>
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
