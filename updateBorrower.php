<?php
require('databaseConnection.php');

if (isset($_POST['saveChanges'])) {
    $book_id = $_POST['book_id'];
    $borrower_name = $_POST['borrower_name'];
    $book_title = $_POST['book_title'];
    $issue_date = $_POST['issue_date'];
    $return_date = $_POST['return_date'];
    $b_status = $_POST['b_status'];

    // Update the borrower information
    $updateQuery = "UPDATE borrower SET borrower_name = '$borrower_name', book_title = '$book_title', 
                    issue_date = '$issue_date', return_date = '$return_date', b_status = '$b_status'
                    WHERE book_id = '$book_id'";

    if (mysqli_query($con, $updateQuery)) {
        echo "<script>alert('Borrower info updated successfully!'); window.location.href = 'manageBorrower.php';</script>";
    } else {
        echo "<script>alert('Error updating borrower info.'); window.location.href = 'manageBorrower.php';</script>";
    }
}
?>
