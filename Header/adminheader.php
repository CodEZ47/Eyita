<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script src="jquery.js" source="type/javascript"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>

    <link rel="stylesheet" href="../css/StyleMovieList.css">
    <link rel="stylesheet" href="../css/styleHeaderTransition.css">
    <link rel="stylesheet" href="../css/main.css">
    <link rel="stylesheet" href="../css/newStyle.css">
    <title>Document</title>
</head>

<body>

    <header>
    <?php
    session_start();
    if(isset($_SESSION['adminData']))
    {
    ?>
        <nav class="nav">
            <a href="adminPage.php" class="header-logo"><img src="Eyita_logo_only.png" alt="Logo"></a>
            <ul class="nav-list">
                
                <li class="nav-link"><a href="UploadMovies.php">Upload A Movie</a></li>
                <li class="nav-link"><a href="EditMovies.php">Manage Movies</a></li>
                <li class="nav-link"><a href="ViewUsers.php">Manage Users</a></li>
                <li class="nav-link"><a href="logout.php">Logout</a></li>
                
            </ul>

            <span id="toggle"><img src="../Resources/Images/icons/toggle.png"></span>
        </nav>
    <?php } else {?>
        <nav class="nav">
            <a href="adminLogin.php" class="header-logo"><img src="Eyita_logo_only.png" alt="Logo"></a>
            <ul class="nav-list">
                
                <li class="nav-link"><a href="adminLogin.php">Login</a></li>
                <li class="nav-link"><a href="regadmin.php">Register</a></li>
                
            </ul>

            <span id="toggle"><img src="../Resources/Images/icons/toggle.png"></span>
        </nav>
    <?php } ?>
    </header>
    <br><br><br><br><br><br><br>