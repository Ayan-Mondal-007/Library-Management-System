<?php require('databaseConnection.php') ?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Add Book</title>
    <link rel="stylesheet" href="addBooks.css">
</head>
<body>
    <div class="form-container">
        <h2>Add New Book</h2>
        <form action="addBooksData.php" method="post">
            <label for="title">Title:</label>
            <input type="text" id="title" name="title" required>

            <label for="author">Author:</label>
            <input type="text" id="author" name="author" required>

            <label for="genre">Genre:</label>
            <input type="text" name="genre" required>

            <label for="isbn">ISBN:</label>
            <input type="text" name="isbn" required>

            <label for="publisher">Publisher:</label>
            <input type="text" name="publisher" required>

            <label for="year">Publication Year:</label>
            <input type="date" name="year" required style="font-size:16px;">

            <label for="description">Description:</label>
            <textarea name="description" class="desc" placeholder="Add A Brief Description About The Book.." ></textarea>

            <!-- Radio buttons for Status -->
            <label for="status">Status:</label>
            <select name="status" id="status" class="status-dropdown" required style="width:94%;margin-bottom:10px;padding:10px;font-size:16px;">
                <option value="Available">Available</option>
                <option value="Issued">Issued</option>
            </select>

            <div class="button-group">
                <input type="submit" value="Add Book" name="addBooks">
                <input type="button" value="Cancel" onclick="window.location.href='manageBooks.php';">
            </div>
        </form>
        
</div>


</body>
</html>
