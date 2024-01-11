<?php
if (isset($_GET['offset']) && isset($_GET['limit'])) {
    $limit = $_GET['limit'];
    $offset = $_GET['offset'];

    require_once "connect.php";

    $searchVal = isset($_GET['search']) ? $_GET['search'] : '';
    $searchVal = '%' . $searchVal . '%';

    // Determine the sorting option (default to name)
    $sortOption = isset($_GET['sort']) ? $_GET['sort'] : 'name';

    // Adjust the SQL query based on the sorting option
    switch ($sortOption) {
        case 'upload_date_newest':
            $orderBy = 'mov_time DESC'; // Newest first
            break;
        case 'upload_date_oldest':
            $orderBy = 'mov_time ASC'; // Oldest first
            break;
        case 'release_date_newest':
            $orderBy = 'mov_rel_date DESC'; // Newest first
            break;
        case 'release_date_oldest':
            $orderBy = 'mov_rel_date ASC'; // Oldest first
            break;
        case 'name':
        default:
            $orderBy = 'mov_title ASC'; // Default sorting
            break;
    }

    // Adjust the SQL query to include search criteria
    $query = "SELECT * FROM movie WHERE mov_title LIKE ? ORDER BY $orderBy LIMIT ? OFFSET ?";

    // Use prepared statement to prevent SQL injection
    $stmt = mysqli_prepare($conn, $query);
    mysqli_stmt_bind_param($stmt, 'sii', $searchVal, $limit, $offset);
    mysqli_stmt_execute($stmt);

    $result = mysqli_stmt_get_result($stmt);

    while ($row = mysqli_fetch_array($result)) {
        echo "<div class='card action adv'>";
        echo "<img src='../uploads/" . $row['mov_image'] . "'>";
        echo "<div class='info'>
                <h1 class='title'>" . $row['mov_title'] . "</h1>
                <p>";
        echo $row['mov_description'];
        $referLink = "moviesPage.php?id={$row['mov_id']}";
        echo "</p>
                <a href='$referLink' class='btn'>Explore</a>
                </div>
                </div>";
    }

    mysqli_stmt_close($stmt);
}
