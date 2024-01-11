<?php

session_start();

if (!isset($_SESSION['adminData'])) {
    header("Location: AdminLogin.php");
}

?>

<?php include "../Header/adminheader.php"; ?>

<?php
require_once "connect.php";

if (isset($_GET['suspend'])) {
    $id = $_GET['suspend'];
    $sqlUpdateStatus = "UPDATE `users` SET `status` = 1 WHERE `users_id` = $id";
    $result = mysqli_query($conn, $sqlUpdateStatus);

    if ($result) {
        $stateMess = "<span style='color: green'>User is Suspended</span>";
    } else {
        $stateMess = "<span style='color: red'>Can't Suspend the User</span>";
    }
}

if (isset($_GET['unsuspend'])) {
    $id = $_GET['unsuspend'];
    $sqlUpdateStatus = "UPDATE `users` SET `status` = 0 WHERE `users_id` = $id";
    $result = mysqli_query($conn, $sqlUpdateStatus);

    if ($result) {
        $stateMess = "<span style='color: green'>User is Unsuspended</span>";
    } else {
        $stateMess = "<span style='color: red'>Can't Unsuspend the User</span>";
    }
}

?>
<div class="container">
    <?php if (isset($stateMess)) echo $stateMess; ?>
    <table class="table">
        <thead>
            <tr>
                <td>UserId</td>
                <td>Username</td>
                <td>Email</td>
                <td>Status</td>
                <td>Manage</td>
            </tr>
        </thead>
        <tbody>
            <?php
            require_once "connect.php";
            $userQuery = "SELECT * FROM users";
            $result = mysqli_query($conn, $userQuery);

            while ($getUser = mysqli_fetch_array($result)) {
            ?>
                <tr>
                    <td><?php echo $getUser['users_id'] ?></td>
                    <td><?php echo $getUser['username'] ?></td>
                    <td><?php echo $getUser['email'] ?></td>
                    <td><?php echo $getUser['status'] == 1 ? 'Suspended' : 'Active'; ?></td>
                    <td>
                        <?php if ($getUser['status'] == 0) : ?>
                            <button id="<?php echo $getUser['users_id'] ?>" onclick="getid(this.id); suspend()">Suspend</button>
                        <?php else : ?>
                            <button id="<?php echo $getUser['users_id'] ?>" onclick="getid(this.id); unsuspend()">Unsuspend</button>
                        <?php endif; ?>
                    </td>
                </tr>
            <?php } ?>
        </tbody>
    </table>
</div>

<script>
    var id = 0;

    function getid(click) {
        id = click;
    }

    function suspend() {
        var answer = window.confirm("Are You Sure You Want to Suspend User id " + id);

        if (answer) {
            window.location.href = "?suspend=" + id;
        } else {
            window.location.href = "ViewUsers.php";
        }
    }

    function unsuspend() {
        var answer = window.confirm("Are You Sure You Want to Unsuspend User id " + id);

        if (answer) {
            window.location.href = "?unsuspend=" + id;
        } else {
            window.location.href = "ViewUsers.php";
        }
    }
</script>

<?php include "../Header/adminfooter.php"; ?>