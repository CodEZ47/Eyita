<?php include "header.php";?>

<main>
<?php
    session_start();
    session_destroy();
    header("Location: login.php");
?>
</main>