<?php include "header.php";  ?>

<?php include "../Header/adminheader.php"; ?>

<main>

<?php
    require_once("connect.php");
    session_start();

    if (isset($_POST['submit']))
    {
        if (empty($_POST['username']) || empty($_POST['password']))
        {
            if(empty($_POST['username']))
                $emptyUsername = "<span style='color: red'>* Please Enter Your Firstname</span>";
           
            if(empty($_POST['password']))
                $emptyPassword = "<span style='color: red'>* Please Enter Your Password</span>";
        } else {
            $username = $_POST['username'];
            $password = $_POST['password'];
            $passwordInc = md5($password);

            $sqlLogin = "SELECT * FROM admin WHERE admin_user = '$username' AND admin_password = '$passwordInc' limit 1";
            $result = mysqli_query($conn, $sqlLogin);

            if(mysqli_num_rows($result) > 0)
            {
                $data = mysqli_fetch_assoc($result);
                $_SESSION['adminData'] = $data;
                header("Location: adminPage.php");
            } else
                $loginFail = "<span style='color: red'>Incorrect Username or Password</span><br>";
        }

    }

?>
<div class="container">
<form action="<?php echo $_SERVER['PHP_SELF'] ?>" method="POST">
    <?php if(isset($loginFail)) echo $loginFail; ?>
        <label for="username">Firstname</label><br>
        <input type="text" name="username" id="username" value="<?php if(isset($_POST['username'])) echo $_POST['username']; ?>" >
        <?php if(isset($emptyuname)) echo $emptyUsername; ?>
        <br>

        <label for="password">Password</label><br>
        <input type="password" name="password" id="password"  value="<?php if(isset($_POST['password'])) echo $_POST['password']; ?>" >
        <?php if(isset($emptyPassword)) echo $emptyPassword; ?>
        <br>
        <a href="regAdmin.php">Don't have a account!</a><br>
        <button type="submit" name='submit'>Login</button>
    </form>
</div>
</main>

<?php include "../Header/adminfooter.php"; ?>