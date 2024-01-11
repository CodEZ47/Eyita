<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
    <link rel="stylesheet" href="../css/StyleMovieList.css">
    <link rel="stylesheet" href="../css/styleHeaderTransition.css">
    <link rel="stylesheet" href="../css/main.css">
    <link rel="stylesheet" href="../css/newStyle.css">
    <link rel="stylesheet" href="../css/styleLandingPage.css">
    <title>Document</title>
</head>

<body>
    <header>
        <nav class="nav">
            <a href="./index.html" class="header-logo"><img src="Eyita_logo_only.png" alt="Logo"></a>
            <ul class="nav-list">
                <li class="nav-link"><a href="MoviesList.php">Movies</a></li>
                <li class="nav-link" id="loginLink">
                    <?php
                    session_start();

                    if (isset($_SESSION['user'])) {
                        echo '<a href="logout.php">Log Out</a>';
                    } else {
                        echo '<a href="login.php">Log In</a>';
                    }
                    ?>
                </li>
            </ul>
            <span id="toggle"><img src="../Resources/Images/icons/toggle.png"></span>
        </nav>
    </header>
</body>

</html>