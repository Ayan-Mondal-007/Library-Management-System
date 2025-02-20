<?php
require('databaseConnection.php');

if (isset($_POST['updateBorrower'])) {
    $book_id = $_POST['book_id'];

    // Fetch the current borrower information based on the book_id
    $query = "SELECT * FROM borrower WHERE book_id = '$book_id'";
    $result = mysqli_query($con, $query);

    if ($result && mysqli_num_rows($result) == 1) {
        $borrower = mysqli_fetch_assoc($result);
        ?>
        <!DOCTYPE html>
        <html lang="en">
        <head>
            <meta charset="UTF-8">
            <meta name="viewport" content="width=device-width, initial-scale=1.0">
            <title>Edit Borrower</title>
            </style>
            <link rel="stylesheet" href="addBooks.css">
        </head>
        <body>   
        </form>
        <div class="form-container">
        <h2>Edit Borrower</h2>
        <form action="updateBorrower.php" method="post">

            <input type="hidden" name="book_id" value="<?php echo $borrower['book_id']; ?>">
            
            <label for="borrower">Borrower Name:</label>
            <input type="text" name="borrower_name" value="<?php echo $borrower['borrower_name']; ?>" required><br>

            <label for="book_title">Book Title:</label>
            <input type="text" name="book_title" value="<?php echo $borrower['book_title']; ?>" required><br>
            
            <label for="issue_date">Issue Date:</label>
            <input type="date" name="issue_date" value="<?php echo $borrower['issue_date']; ?>" required><br>

            <label for="return_date">Return Date:</label>
            <input type="date" name="return_date" value="<?php echo $borrower['return_date']; ?>" required><br>

            <label for="status">Status:</label>
            <input type="text" name="b_status" value="<?php echo $borrower['b_status']; ?>" required><br>
            </select>
          

        <div class="button-group" style="justify-content:center;">
            <input type="submit" name="saveChanges">
        </div>
        </form>   
    </div>
        </body>
        </html>
        <?php
    } else {
        echo "No borrower found with that ID.";
    }
}
?>
