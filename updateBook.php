<?php
require('databaseConnection.php');

if (isset($_POST['updateBook'])) {
    // Get form data
    $book_id = $_POST['book_id'];
    $title = $_POST['title'];
    $author = $_POST['author'];
    $genre = $_POST['genre'];
    $isbn = $_POST['isbn'];
    $publisher = $_POST['publisher'];
    $year = $_POST['year'];
    $description = $_POST['description'];
    $status = $_POST['status'];

    // Update the book in the database
    $query = "UPDATE books SET book_title='$title', author='$author', genre='$genre', isbn='$isbn', publisher='$publisher', pub_year='$year', description='$description', status='$status' WHERE id='$book_id'";

    if (mysqli_query($con, $query)) {
        echo "<script>alert('Book Updated Successfully!'); window.location.href = 'manageBooks.php';</script>";
    } else {
        echo "<script>alert('Error updating book!'); window.location.href = 'manageBooks.php';</script>";
    }
}
?>
