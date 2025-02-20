<?php
require('databaseConnection.php');
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
    <link rel="stylesheet" href="books.css">
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
                <li><a href="#">BOOKS</a></li>
                <li><a href="about.php">ABOUT</a></li>
                <li><a href="feedback.php">FEEDBACK</a></li>
            </ul>
        </nav>
    </header>
    <section>
        <div class="box" id="book-section">
            <div class="box-heading">
                <div>
                    <h1 class="sub-heading">BOOKS</h1>
                </div>
                <div>
                    <form method="post">
                        <input type="text" class="search-box" placeholder="Search..." name="search" required>
                        <button class="search-button" type="submit" name="submit"><i class="fa-solid fa-magnifying-glass"></i></button>
                    </form>
                </div>
            </div>
            <hr><br>
            
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
              </tr>";
      }
      echo "</tbody></table>";
    } else {
      echo "<p>No books found in the library.</p>";
    }
  }
  ?>
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