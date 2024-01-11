<?php require "connect.php";  ?>

<?php include "../Header/adminheader.php"; ?>

<main>
    <?php
    session_start();

    if (isset($_SESSION['adminData'])) {
        $adminProfile = $_SESSION['adminData'];
    } else {
        header("Location: AdminLogin.php");
    }
    ?>

    <br>
    <div class="container">
        <h1>Welcome <?php echo $adminProfile['admin_first_name'] . " " . $adminProfile['admin_last_name'] ?></h1>
    </div>
</main>

<?php include "../Header/adminfooter.php"; ?>