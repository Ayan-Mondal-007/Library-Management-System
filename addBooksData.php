<?php  
session_start(); 

if(!isset($_SESSION['AdminLoginId'])){
    header('location:index.php');
}
?>


<?php

require('databaseConnection.php');

    // Get form data

    if(isset($_POST['addBooks'])){

        $title = $_POST['title'];
        $author = $_POST['author'];
        $genre = $_POST['genre'];
        $isbn = $_POST['isbn'];
        $publisher = $_POST['publisher'];
        $year = $_POST['year'];
        $description = $_POST['description'];
        $status = $_POST['status'];
    }

    // Insert book into the database
    $query = "INSERT INTO books (book_title, author, genre, isbn, publisher, pub_year, description,status) VALUES ('$title','$author','$genre','$isbn','$publisher','$year','$description','$status')";

    $success = mysqli_query($con,$query);

    // function starts here for renumbering id's
    function renumberBooks($con) {

        $query = "SELECT id FROM books ORDER BY id ASC";
        $res = mysqli_query($con, $query);
        
        $newId = 1;
        while ($row = mysqli_fetch_assoc($res)) {
            $currentId = $row['id'];

            $updateQuery = "UPDATE books SET id = $newId WHERE id = $currentId";
            mysqli_query($con, $updateQuery);
            $newId++; 
        }
    }


    if($success){
        renumberBooks($con);
        echo("<script>
        alert('Book Saved Successfully!');
        </script>");
        header('location:manageBooks.php');
    }else{
        echo ('Error! Something went wrong!');
    }

 

    ?>

    