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
        <h2>Add Borrower</h2>
        <form action="borrowerInfoStore.php" method="post">
            
            <label for="borrower">Borrower Name:</label>
            <input type="text" id="author" name="borrower" required>

            <label for="book_title">Book Title:</label>
            <input type="text" id="title" name="book_title" required>

            <label for="book_id">Book ID:</label>
            <input type="number" name="book_id" required>
            

            <label for="issue_date">Issue Date:</label>
            <input type="date" name="issue_date" required>

            <label for="return_date">Return Date:</label>
            <input type="date" name="return_date">

            <label for="status">Status:</label>
            <select name="status" id="status" class="status-dropdown" required style="width:94%;margin-bottom:10px;padding:10px;font-size:16px;">
                <option value="Issued">Issued</option>
                <option value="Available">Available</option>
            </select>
          

            <div class="button-group">
                <input type="submit" value="Add Borrower" name="addBorrower">
                <input type="button" value="Cancel" onclick="window.location.href='manageBorrower.php';">
            </div>
        </form>   
    </div>
    
</body>
</html>
