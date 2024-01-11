<?php include "../header/header.php"; ?>

<body onload="loaded(); onLoadFunc()">

    <?php
    require_once("connect.php");
    session_start();
    $id = $_GET['id'];
    $queryGet = $query = "SELECT * FROM movie WHERE mov_id = '$id'";
    $result = mysqli_query($conn, $queryGet);
    $data = mysqli_fetch_assoc($result);
    ?>

    <!-- The Movie Began -->
    <?php $banner = "uploads/" . $data['mov_banner']; ?>
    <div class="banner" style="background: url(../<?php echo $banner; ?>);">
        <div class="content">
            <h2 id="nametitle">
                <?php echo $data['mov_title']; ?>
                </span></h2>
            <p id="rating">
                <img src="../../Resources/Images/icons/rating.png">
                Rating to Be added
            </p>
            <p id="details"><?php echo $data['mov_description']; ?></p>
            <div class="tags">
                <ul>
                    <li id="tag">Action</li>
                    <li id="tag">Adventure</li>
                    <li id="tag">Drama</li>

                </ul>
            </div>

            <a href="<?php echo $data['mov_trailer'] ?>" class="play">
                <img src="../Resources/Images/icons/play.png">
                Watch Trailer
            </a>
            <?php $img = "uploads/" . $data['mov_image']; ?>
            <div class="poster" style="background: url(../<?php echo $img; ?>); background-size: cover;"></div>
            <ul class="social">
                <li><a href="#"><img src="../Resources/Images/icons/twitter.png"></a></li>
                <li><a href="#"><img src="../Resources/Images/icons/telegram.png"></a></li>
                <li><a href="#"><img src="../Resources/Images/icons/insta.png"></a></li>
            </ul>
        </div>
    </div>

    <!-- Movie ends -->

    <div class="addComment">

        <?php
        if (isset($_SESSION['data'])) {
            if (!empty($_POST['commentValue'])) {
                $val = $_POST['commentValue'];

                if (true) {
                    $user_id = $_SESSION['data']['users_id'];
                    $mov_id = $_GET['id'];

                    $date = date('Y-m-d h:i:s');
                    $sqlComment = "INSERT INTO comments (user_id, mov_id, comment, date) VALUES ('$user_id', '$mov_id', '$val', '$date')";
                    $result = mysqli_query($conn, $sqlComment);
                    if ($result)
                        echo "<script>alert('Comment Added')</script>";
                    else
                        echo "<script>alert('Failed To Add a Comment')</script>";
                }
            }
        } else {
            echo "No Comment";
        }
        ?>

        <form action="<?php echo $_SERVER['PHP_SELF'] . "?id=" . $_GET['id'] ?>" method="POST">

            <textarea name="commentValue"></textarea>
            <br>
            <button name="post" type="submit">Post Comment</button>
        </form>

    </div>

    <!-- Comment -->

    <div class="getcomment">
        <h2>Comments</h2>
        <?php

        $movid = $_GET['id'];
        $selectComment = "SELECT * FROM comments WHERE mov_id = '$movid'";
        $result = mysqli_query($conn, $selectComment);

        while ($row = mysqli_fetch_array($result)) {
            $userid = $row['user_id'];

            $getName = "SELECT username FROM users WHERE users_id = '$userid'";

            $nameResult = mysqli_query($conn, $getName);
            $userName = mysqli_fetch_assoc($nameResult);

            echo "<div class='eachcomment'>";
            echo $userName['username'] . " - " . $row['date'] . "<br>";
            echo $row['comment'] . "<br>";
            echo "</div>";
        }
        ?>
    </div>

    <?php include "../header/footer.php"; ?>