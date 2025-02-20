<?php 
require('databaseConnection.php'); 

// Check if book_id is set in the URL
if (isset($_POST['book_id'])) {
    $book_id = $_POST['book_id'];
    
    // Fetch the book details from the database
    $query = "SELECT * FROM books WHERE id = '$book_id'";
    $result = mysqli_query($con, $query);
    $book = mysqli_fetch_assoc($result);
} else {
    // Redirect if no book_id is set
    header('location:manageBooks.php');
    exit;
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Book</title>
    <link rel="stylesheet" href="addBooks.css">
</head>
<body>
    <div class="form-container">
        <h2>Edit Book</h2>
        <form action="updateBook.php" method="post">
            <input type="hidden" name="book_id" value="<?php echo $book['id']; ?>">

            <label for="title">Title:</label>
            <input type="text" id="title" name="title" value="<?php echo $book['book_title']; ?>" required>

            <label for="author">Author:</label>
            <input type="text" id="author" name="author" value="<?php echo $book['author']; ?>" required>

            <label for="genre">Genre:</label>
            <input type="text" name="genre" value="<?php echo $book['genre']; ?>" required>

            <label for="isbn">ISBN:</label>
            <input type="text" name="isbn" value="<?php echo $book['isbn']; ?>" required>

            <label for="publisher">Publisher:</label>
            <input type="text" name="publisher" value="<?php echo $book['publisher']; ?>" required>

            <label for="year">Publication Year:</label>
            <input type="date" name="year" value="<?php echo $book['pub_year']; ?>" required>

            <label for="description">Description:</label>
            <textarea name="description" class="desc" placeholder="Add A Brief Description About The Book.."><?php echo $book['description']; ?></textarea>

            <!-- Radio buttons for Status -->
            <label for="status">Status:</label>
            <select name="status" id="status" class="status-dropdown" required>
                <option value="Available" <?php if($book['status'] == 'Available') echo 'selected'; ?>>Available</option>
                <option value="Issued" <?php if($book['status'] == 'Issued') echo 'selected'; ?>>Issued</option>
            </select>

            <div class="button-group">
                <input type="submit" value="Update Book" name="updateBook">
                <input type="button" value="Cancel" onclick="window.location.href='manageBooks.php';">
            </div>
        </form>
    </div>
</body>
</html>
