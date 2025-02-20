<?php
$server = "localhost";
$username = "root";
$pass = "";
$dbName = "librarymanagement";

$con = mysqli_connect($server,$username,$pass,$dbName);

if(!$con){
    echo("Error! Database Not Connected!");
}

?>