<?php 
    require('databaseConnection.php');

    if(isset($_POST['addBorrower'])){
        $borrower = $_POST['borrower'];
        $book_title = $_POST['book_title'];
        $book_id = $_POST['book_id'];
        $status = $_POST['status'];
        $issue_date = $_POST['issue_date'];
        $return_date = $_POST['return_date'];

        $addBorrower = "INSERT INTO borrower (borrower_name, book_title, book_id, b_status, issue_date, return_date) VALUES ('$borrower', '$book_title', '$book_id', '$status', '$issue_date', '$return_date')";

        $result = mysqli_query($con,$addBorrower);

        if ($result) {
            $sql_update = "UPDATE books SET status = 'issued' WHERE id = $book_id";
            $update_result = mysqli_query($con, $sql_update);
        }

        if($result){
            echo("<script>
            alert('Borrower Info Added Successfully!');
            window.location.href = 'manageBorrower.php';
            </script>");
        }else{
            echo("<script>
            alert('Something went wrong!');
            </script>");
        }
    }
    
    
    ?>