<?php include "header.php";  ?>

<?php include "../Header/adminheader.php"; ?>

<main>

<?php
    require_once("connect.php");
        if (isset($_POST['submit']))
        {
            if (empty($_POST['firstname']) || empty($_POST['lastname']) || empty($_POST['password'])|| empty($_POST['repassword']))
            {
                if(empty($_POST['firstname']))
                    $emptyfirstname = "<span style='color: red'>* Set your Firstname</span>";
                if(empty($_POST['lastname']))
                    $emptylastname = "<span style='color: red'>* Set Your Lastname</span>";
                if(empty($_POST['username']))
                    $emptyusername = "<span style='color: red'>* Set Your Username</span>";
                if(empty($_POST['password']))
                    $emptyPassword = "<span style='color: red'>* Set Your Password</span>";
                if(empty($_POST['repassword']))
                    $emptyrePassword = "<span style='color: red'>* Set The Password Again</span>";
            } else {
                if($_POST['password'] !== $_POST['repassword'])
                    $emptyrePassword = "<span style='color: red'>* Password Doesn't Match</span>";
                else {
                    $firstname = $_POST['firstname'];
                    $lastname = $_POST['lastname'];
                    $username = $_POST['username'];
                    $password = md5($_POST['password']);

                    $sqlCheck = "SELECT * FROM admin WHERE admin_user = '$username' limit 1";
                    $check = mysqli_query($conn, $sqlCheck);
                    
                    if(mysqli_num_rows($check) == 0)
                    {

                        $sqlInsert = "INSERT INTO admin (admin_first_name, admin_last_name, admin_user, admin_password) VALUES ('$firstname', '$lastname', '$username', '$password')";
                        $result = mysqli_query($conn, $sqlInsert);
                    
                        if($result)
                            $succesReg = "<span style='color: green'>Registration Succesful</span><br>";
                        else 
                            $succesReg = "<span style='color: red'>Registration Failed!</span><br>";
                    } else {
                        $succesReg = "<span style='color: red'>Username or Email Already Exists</span><br>";
                    }
                }
            }

        }
        
    ?>
<div class="container">
    <form action="<?php echo $_SERVER['PHP_SELF']; ?>" method="POST">

        <?php if(isset($succesReg)) echo $succesReg; ?>

        <label for="firstname">Firstname</label><br>
        <input type="text" name="firstname" id="firstname" value="<?php if(isset($_POST['firstname'])) echo $_POST['firstname']; ?>" >
        <?php if(isset($emptyfirstname)) echo $emptyfirstname; ?>
        <br>

        <label for="lastname">Lastname</label><br>
        <input type="text" name="lastname" id="lastname"  value="<?php if(isset($_POST['lastname'])) echo $_POST['lastname']; ?>" >
        <?php if(isset($emptylastname)) echo $emptylastname; ?>
        <br>

        <label for="username">username</label><br>
        <input type="username" name="username" id="username"  value="<?php if(isset($_POST['username'])) echo $_POST['username']; ?>" >
        <?php if(isset($emptyusername)) echo $emptyusername; ?>
        <br>

        <label for="password">Password</label><br>
        <input type="password" name="password" id="password"  value="<?php if(isset($_POST['password'])) echo $_POST['password']; ?>" >
        <?php if(isset($emptyPassword)) echo $emptyPassword; ?>
        <br>

        <label for="repassword">Re-Password</label><br>
        <input type="password" name="repassword" id="repassword"  value="<?php if(isset($_POST['repassword'])) echo $_POST['repassword']; ?>" >
        <?php if(isset($emptyrePassword)) echo $emptyrePassword; ?>
        <br>

        <a href="adminLogin.php">Login to Your Account</a><br>

        <button type="submit" name='submit'>Sign Up</button>
    </form>
</div>
</main>

<?php include "../Header/adminfooter.php"; ?>