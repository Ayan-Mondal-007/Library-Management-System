<?php

// function to get total books
    
function getTotalBooks() {
    require('databaseConnection.php');


    $sql = "SELECT COUNT(*) AS total_books FROM books";
    $result = $con->query($sql);

    if ($result->num_rows > 0) {
        $row = $result->fetch_assoc();
        return $row['total_books'];
    } else {
        return 0; 
    }

    $con->close();
}

// function to get total no of returned books

function getReturnedBooks(){
    require('databaseConnection.php');

    $returned = "SELECT COUNT(*) AS total_returnedBooks FROM returned_records";

    $result = $con -> query($returned);

    if ($result->num_rows > 0) {
        $row = $result->fetch_assoc();
        return $row['total_returnedBooks'];
    } else {
        return 0;
    }

    $con->close();
}

// function to get total no of issued books

function getIssuedBooks(){
    require('databaseConnection.php');

    $issued = "SELECT COUNT(*) AS issued_books FROM borrower";

    $result = $con -> query($issued);

    if ($result->num_rows > 0) {
        $row = $result->fetch_assoc();
        return $row['issued_books'];
    } else {
        return 0;
    }

    $con->close();

}

// function to get total no of available books

function getAvailableBooks() {

    $totalBooks = getTotalBooks();
    
    $issuedBooks = getIssuedBooks();
    
    $availableBooks = $totalBooks - $issuedBooks;
    
    return $availableBooks;
}




?>
