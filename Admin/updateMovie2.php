<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <?php
    
    session_start();
    $id = $_GET['id'];
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

                        // $sqlInsert = "INSERT INTO movie (mov_title, mov_description, mov_rel_date, mov_image, mov_banner, mov_trailer, mov_time) VALUES ('$title', '$desc', '$release', '$newName', '$newNameBanner', '$trailer', '$time')";
                        
                        
                        $dbServer = 'localhost';
                        $dbUsername = 'root';
                        $dbPassword = '';
                        $dbName = 'loginsystem';

                        $connect = mysqli_connect($dbServer, $dbUsername, $dbPassword, $dbName);
                        
                        $title = $_POST['title'];
                        $desc = $_POST['desc'];
                        $trailer = $_POST['trailer'];
                        $release = $_POST['release'];
                                
                        $query = "UPDATE `movie` SET `mov_title`='".$title."',`mov_description`='".$desc."',`mov_rel_date`='".$release."',`mov_image`='".$newName."',`mov_banner`='".$newNameBanner."',`mov_trailer`='".$trailer."' WHERE `mov_id` = $id";
                        
                        $result = mysqli_query($connect, $query);
                        
                        if($result)
                        {
                            echo 'Data Updated';
                        }else{
                            echo 'Data Not Updated';
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
        }
    } else {
        header("Location: AdminLogin.php");
    }
    ?>
    <?php if(isset($errorMess)) echo $errorMess; else if(isset($succMess)) echo $succMess;?>
    <form action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']."?id=$id") ?>" method="POST" enctype="multipart/form-data">
    Select Image to Upload:<br>
    <input type="text" name="title" placeholder="Title" value="<?php if(isset($_POST['title'])) echo $_POST['title']; ?>">
    <?php if(isset($titleErr)) echo $titleErr; ?>
    <br>
    <textarea name="desc" cols="20" rows="10">
                Lorem ipsum dolor, sit amet consectetur adipisicing elit. 
                Quod perspiciatis expedita error! Repellendus animi quod est accusamus 
                laborum optio quaerat repudiandae harum, libero voluptas dolores iure 
                accusantium distinctio sequi doloribus.
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
    <input type="submit" name="update" value="Update"><br>

    </form>
</body>
</html>