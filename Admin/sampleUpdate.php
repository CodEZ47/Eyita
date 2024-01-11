<?php

// php code to Update data from mysql database Table

if(isset($_POST['update']))
{
    
    $dbServer = 'localhost';
    $dbUsername = 'root';
    $dbPassword = '';
    $dbName = 'loginsystem';

    $connect = mysqli_connect($dbServer, $dbUsername, $dbPassword, $dbName);
   
   $id = 6;
   $username = $_POST['name'];
   $email = $_POST['email'];
           
   $query = "UPDATE `users` SET `username`='".$username."',`email`='".$email."' WHERE `users_id` = $id";
   
   $result = mysqli_query($connect, $query);
   
   if($result)
   {
       echo 'Data Updated';
   }else{
       echo 'Data Not Updated';
   }
   mysqli_close($connect);
}

?>

<?php include "../Header/adminheader.php"; ?>

    <form action="<?php echo $_SERVER['PHP_SELF'];?>" method="POST">
        <input type="text" name="name" placeholder="name">
        <br>
        <input type="email" name="email" placeholder="email"><br>
        <input type="submit" name="update" value="Update">
    </form>

    <?php include "../Header/adminfooter.php"; ?>