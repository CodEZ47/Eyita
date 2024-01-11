<?php
    $dbServer = 'localhost';
    $dbUsername = 'root';
    $dbPassword = '';
    $dbName = 'loginsystem';

    $conn = mysqli_connect($dbServer, $dbUsername, $dbPassword, $dbName);

    if(!$conn)
        die("Connection to DB Failed".mysqli_connect_error());
?>