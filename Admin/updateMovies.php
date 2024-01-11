<?php include "../Header/adminheader.php"; ?>
<
    <?php
    
    session_start();
    $id = $_GET['id'];

    $dbServer = 'localhost';
    $dbUsername = 'root';
    $dbPassword = '';
    $dbName = 'loginsystem';

    $connect = mysqli_connect($dbServer, $dbUsername, $dbPassword, $dbName);

    $sqlLogin = "SELECT * FROM `movie` WHERE `mov_id` = $id LIMIT 1";
    $resultSelect = mysqli_query($connect, $sqlLogin);
    $data = mysqli_fetch_assoc($resultSelect);
    if(isset($_SESSION['adminData']))
    {
        if(isset($_POST['update']))
        {
            if(!empty($_FILES['image']['name']) 
            && !empty($_FILES['banner_image']['name']) 
            && !empty($_POST['desc'])
            && !empty($_POST['release'])
            && !empty($_POST['trailer'])
            && !empty($_POST['title']) )
            {
                //Movie Image
                $name = $_FILES['image']['name'];
                $size = $_FILES['image']['size'];
                $temp = $_FILES['image']['tmp_name'];

                $allowd = array('jpg', 'gif', 'jpeg', 'png');

                $fileExtImg = explode('.', $name);
                $fileExtImg = strtolower(end($fileExtImg));

                //Banner Image
                $nameBanner = $_FILES['banner_image']['name'];
                $sizeBanner = $_FILES['banner_image']['size'];
                $tempBanner = $_FILES['banner_image']['tmp_name'];

                $allowd = array('jpg', 'gif', 'jpeg', 'png');

                $fileExtBanner = explode('.', $nameBanner);
                $fileExtBanner = strtolower(end($fileExtBanner));


                if(!in_array($fileExtImg, $allowd))
                {
                    echo "<p style='color: red'>Image Wrong Formant!</p>";
                } else if(!in_array($fileExtImg, $allowd)) {
                    echo "<p style='color: red'>Banner Wrong Formant!</p>";
                } 
                else {
                    if ($sizeBanner >= 5000000)
                    {
                        echo "<p style='color: red'>Banner Too Big!</p>";
                        
                    } else if ($size >= 5000000) {
                        echo "<p style='color: red'>Image Too Big!</p>";
                    }
                    else {
                        //Movie Image
                        $newName = uniqid('', true);
                        $newName .= '.'.$fileExtImg;
                        
                        $folder = "../uploads/${newName}";

                        //Banner Image
                        $newNameBanner = uniqid('', true);
                        $newNameBanner .= '.'.$fileExtBanner;
                        
                        $folderBanner = "../uploads/${newNameBanner}";

                        $title = $_POST['title'];
                        $desc = $_POST['desc'];
                        //trailer
                        $trailer = htmlspecialchars($_POST['trailer']);

                        $time = date('Y-m-d H:i:s');
                        $release = $_POST['release'];
                        
                        $title = $_POST['title'];
                        $desc = $_POST['desc'];
                        $trailer = $_POST['trailer'];
                        $release = $_POST['release'];
                                
                        $query = "UPDATE `movie` SET `mov_title`='".$title."',`mov_description`='".$desc."',`mov_rel_date`='".$release."',`mov_image`='".$newName."',`mov_banner`='".$newNameBanner."',`mov_trailer`='".$trailer."' WHERE `mov_id` = $id";
                        $result = mysqli_query($connect, $query);

                        
                        
                        if($result)
                        {
                            move_uploaded_file($tempBanner, $folderBanner);
                            move_uploaded_file($temp, $folder);
                            $stateMess = "<span style='color: green'>Movie Updated</span>";
                        }else{
                            $stateMess = "<span style='color: red'>Movie Not Updated</span>";
                        }
                        mysqli_close($connect);
                    }
                }
            } else {
                if(empty($_FILES['image']['name'])) $imgErr = "<span style='color: red'>* Enter the image to be uploaded</span><br>";
                if(empty($_POST['desc'])) $descErr = "<span style='color: red'>* Enter the image to be uploaded</span><br>";
                if(empty($_POST['title'])) $titleErr = "<span style='color: red'>* Enter the image to be uploaded</span><br>";
                if(empty($_POST['trailer'])) $trailerErr = "<span style='color: red'>* Enter the image to be uploaded</span><br>";
                if(empty($_POST['release'])) $releaseErr = "<span style='color: red'>* Enter the image to be uploaded</span><br>";
                if(empty($_FILES['banner_image']['name'])) $bannerErr = "<span style='color: red'>* Enter the image to be uploaded</span><br>";
            }
        } else if(isset($_POST['delete'])) {
            $dbServer = 'localhost';
            $dbUsername = 'root';
            $dbPassword = '';
            $dbName = 'loginsystem';
        
            $connect = mysqli_connect($dbServer, $dbUsername, $dbPassword, $dbName);
            $sqlDelete = "DELETE FROM `movie` WHERE `mov_id` = $id";
            $result = mysqli_query($connect, $sqlDelete);

            if($result)
            {
                $stateMess = "<span style='color: green'>Movie is Deleted</span>";
            }else{
                $stateMess = "<span style='color: red'>Can't Delete The Movie</span>";
            }
            mysqli_close($connect);
        }
    } else {
        header("Location: AdminLogin.php");
    }
    ?>
    <div class="container">
    <?php if(isset($stateMess)) echo $stateMess;?>
    <form action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']."?id=$id") ?>" method="POST" enctype="multipart/form-data">
    Select Image to Upload:<br>
    <input type="text" name="title" placeholder="Title" value="<?php echo $data['mov_title']; ?>">
    <?php if(isset($titleErr)) echo $titleErr; ?>
    <br>
    <textarea name="desc" cols="20" rows="10"><?php echo $data['mov_description']; ?></textarea>
    <?php if(isset($descErr)) echo $descErr; ?>
    <br>
    <input type="text" name="trailer" placeholder="Trailer" value="<?php echo $data['mov_trailer']; ?>">
    <?php if(isset($trailerErr)) echo $trailerErr; ?>
    <br>
    <input type="text" name="release" placeholder="release" value="<?php echo $data['mov_rel_date']; ?>">
    <?php if(isset($releaseErr)) echo $trailerErr; ?>
    <br>
    Image: 
    <div class='get_img'>
        <img src="<?php echo "../uploads/".$data['mov_image']; ?>">
        <div class="info">
            <input type="file" name="image">
        </div>
    </div>
    
    <?php if(isset($imgErr)) echo $imgErr; ?>
    <br>
    Banner: 
    <div class="get_img">
        <img src="<?php echo "../uploads/".$data['mov_banner']; ?>">
        <div class="info">
            <input type="file" name="banner_image">
        </div>
    </div>
    
    <?php if(isset($bannerErr)) echo $bannerErr; ?>
    <br><br>
    <input type="submit" name="update" value="Update">
    <input type="reset" value="New Beginning">
    <br><br>
    <button type="submit" name="delete">Delete The Movie</button>

    </form>
    </div>

<?php include "../Header/adminfooter.php"; ?>