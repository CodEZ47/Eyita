<?php
    require_once("connect.php");

    $movid = $_GET['id'];
    $selectComment = "SELECT * FROM comments WHERE mov_id = '$movid'";
    $result = mysqli_query($conn, $selectComment);
    
    while ($row = mysqli_fetch_array($result))
    {
        $userid = $row['user_id'];
        $name = "SELECT username FROM users WHERE user_id = '$userid'";
        $nameGet = mysqli_query($conn, $name);

        echo $nameGet."<hr>".$row['comment'];
    }

?>