<?php

    if(isset($_GET['offset']) && isset($_GET['limit']))
    {
        $limit = $_GET['limit'];
        $offset = $_GET['offset'];

        require_once "connect.php";

        $searchVal = $_GET['search'];
        $searchVal = '%'.$searchVal.'%';
        if(isset($_GET['search']))
            $query = "SELECT * FROM movie WHERE mov_title LIKE '$searchVal' LIMIT {$limit} OFFSET {$offset}";
        else
            $query = "SELECT * FROM movie LIMIT {$limit} OFFSET {$offset}";
        
        $result = mysqli_query($conn, $query);

        while ($row = mysqli_fetch_array($result))
        {
            echo "<div class='card action adv'>";
            echo "<img src='uploads/".$row['mov_image']."'>";
            echo "<div class='info'>
                <h1 class='title'>".$row['mov_title']."</h1>
                <p>";
            echo $row['mov_description'];
            $referLink = "moviesPage.php?id={$row['mov_id']}";
            echo "</p>
                <a href='$referLink' class='btn'>Explore</a>
                </div>
                </div>";

        }
    }
?>
            