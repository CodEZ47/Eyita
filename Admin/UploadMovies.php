<?php include "../Header/adminheader.php"; ?>
    <?php
    require_once("connect.php");
    session_start();
    if(isset($_SESSION['adminData']))
    {
        if(isset($_POST['submit']))
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

                        $sqlInsert = "INSERT INTO movie (mov_title, mov_description, mov_rel_date, mov_image, mov_banner, mov_trailer, mov_time) VALUES ('$title', '$desc', '$release', '$newName', '$newNameBanner', '$trailer', '$time')";
                        $result = mysqli_query($conn, $sqlInsert);
                    
                        if($result)
                        {
                            move_uploaded_file($tempBanner, $folderBanner);
                            move_uploaded_file($temp, $folder);
                            unset($_POST['title']);
                        }
                        else 
                            echo "<span style='color: red'>Upload Failed!</span><br>";

                        $succMess = "<span style='color: green'>Upload Succesful</span><br>";
                        
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
        }
    } else {
        header("Location: AdminLogin.php");
    }
    ?>
    <div class="container">
    <?php if(isset($errorMess)) echo $errorMess; else if(isset($succMess)) echo $succMess;?>
    <form action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']) ?>" method="POST" enctype="multipart/form-data">
    <h2>Upload A Movie</h2>
    <input type="text" name="title" placeholder="Title" value="<?php if(isset($_POST['title'])) echo $_POST['title']; ?>">
    <?php if(isset($titleErr)) echo $titleErr; ?>
    <br>
    <textarea name="desc" cols="20" rows="10">
    </textarea>
    <?php if(isset($descErr)) echo $descErr; ?>
    <br>
    <input type="text" name="trailer" placeholder="Trailer" value="<?php if(isset($_POST['trailer'])) echo $_POST['trailer']; ?>">
    <?php if(isset($trailerErr)) echo $trailerErr; ?>
    <br>
    <input type="text" name="release" placeholder="release" value="<?php if(isset($_POST['release'])) echo $_POST['release']; ?>">
    <?php if(isset($releaseErr)) echo $trailerErr; ?>
    <br>
    Image: 
    <input type="file" name="image">
    <?php if(isset($imgErr)) echo $imgErr; ?>
    <br>
    Banner: 
    <input type="file" name="banner_image">
    <?php if(isset($bannerErr)) echo $bannerErr; ?>
    <br>
    <button type="submit" name="submit">Upload</button><br>

    </form>
    </div>
<?php include "../Header/adminfooter.php"; ?>