<?php

    require_once("connect.php");
    session_start();
    
    if(!isset($_SESSION['adminData']))
    {
        header("Location: AdminLogin.php");
    }

    $adminProfile = $_SESSION['adminData'];

    if(isset($_GET['offset']) && isset($_GET['limit']))
    {
        $limit = $_GET['limit'];
        $offset = $_GET['offset'];

        $searchVal = $_GET['search'];
        $query = "SELECT * FROM movie LIMIT {$limit} OFFSET {$offset}";
        
        $result = mysqli_query($conn, $query);

        while ($row = mysqli_fetch_array($result))
        {
            echo "<div class='card'>";
            echo "<img src='../uploads/".$row['mov_image']."'>";
            echo "<div class='info'>
                <h1 class='title'>".$row['mov_title']."</h1>
                <p>";
            echo $row['mov_description'];
            $referLink = "updateMovies.php?id={$row['mov_id']}";
            echo "</p>
                <a href='$referLink' class='btn'>Edit</a>
                </div>
                </div>";
        }
    }
?>
            