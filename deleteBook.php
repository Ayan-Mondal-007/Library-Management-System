<?php  
session_start(); 

if(!isset($_SESSION['AdminLoginId'])){
    header('location:index.php');
}
?>

<?php
require('databaseConnection.php');

function renumberBooks($con) {

    $query = "SELECT id FROM books ORDER BY id ASC";
    $result = mysqli_query($con, $query);
    
    $newId = 1;

    while ($row = mysqli_fetch_assoc($result)) {
        $currentId = $row['id'];

        $updateQuery = "UPDATE books SET id = $newId WHERE id = $currentId";
        mysqli_query($con, $updateQuery);
        $newId++; 
    }
}

if (isset($_POST['deleteBook'])) {
    $bookId = $_POST['book_id'];

    $deleteQuery = "DELETE FROM books WHERE id = $bookId";
    $deleteResult = mysqli_query($con, $deleteQuery);

    if($deleteResult){
        renumberBooks($con);
        echo("<script>
        alert('Book has been Deleted Successfully!');
        window.location.href = 'manageBooks.php';
        </script>");
        // header('location:manageBooks.php');
    }else{
        echo ('Error! Something went wrong!');
    }
}

$query = "SELECT * FROM books ORDER BY id ASC";
$result = mysqli_query($con, $query);
?>
