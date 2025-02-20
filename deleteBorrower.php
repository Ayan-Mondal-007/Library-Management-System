
 <?php

require('databaseConnection.php');

if (isset($_POST['deleteBorrower'])) {
    $book_id = $_POST['book_id'];  


    $fetchBorrowerQuery = "SELECT * FROM borrower WHERE book_id = '$book_id' AND b_status = 'issued'";
    $fetchResult = mysqli_query($con, $fetchBorrowerQuery);


    if (mysqli_num_rows($fetchResult) > 0) {

        $row = mysqli_fetch_assoc($fetchResult);
        $borrower_name = $row['borrower_name'];
        $book_title = $row['book_title'];
        $issue_date = $row['issue_date'];
        $return_date = date('Y-m-d');  
        

        $insertReturnRecordQuery = "INSERT INTO returned_records (borrower_name, book_title, book_id, issue_date, return_date) 
                                    VALUES ('$borrower_name', '$book_title', '$book_id', '$issue_date', '$return_date')";
        if (mysqli_query($con, $insertReturnRecordQuery)) {

            $deleteBorrowerQuery = "DELETE FROM borrower WHERE book_id = '$book_id' AND b_status = 'issued'";

            if (mysqli_query($con, $deleteBorrowerQuery)){
            $sql_update = "UPDATE books SET status = 'available' WHERE id = $book_id"; 
            mysqli_query($con, $sql_update);
        }

            if (mysqli_query($con, $deleteBorrowerQuery)) {
                echo "<script>
                alert('Borrower record deleted and moved to returned_records.'); 
                window.location.href = 'manageBorrower.php';
                </script>";
            } else {
                echo "<script>
                alert('Error deleting record from borrower table.'); 
                window.location.href = 'manageBorrower.php';
                </script>";
            }
        } else {
            echo "<script>
            alert('Error inserting record into returned_records.');
             window.location.href = 'manageBorrower.php';
             </script>";
        }
    } else {
        echo "<script>
        alert('No issued record found for the given Book ID.');
         window.location.href = 'manageBorrower.php';
         </script>";
    }
}
?>

