<?php 

session_start();

	include("connection.php");
	include("functions.php");


	if($_SERVER['REQUEST_METHOD'] == "POST")
	{
		//something was posted
		$user_name = $_POST['user_name'];
		//$password = $_POST['password'];
		$fp = $_POST['fp'];
		$fc = $_POST['fc'];
		$bd = $_POST['bd'];

		if(!empty($user_name) &&  !is_numeric($user_name))
		{

			//read from database
			$query = "select * from userss where user_name = '$user_name' limit 1";
			$result = mysqli_query($con, $query);

			if($result)
			{
				if($result && mysqli_num_rows($result) > 0)
				{

					$user_data = mysqli_fetch_assoc($result);

					$pdd= $user_data['password'] ;
					$nfp =$user_data['favorite_pet'];
					$nfc =$user_data['favorite_club'];
					$nbd =$user_data['date_of_birth'];					
					if($nfp === $fp && $nfc=== $fc && $bd === $bd  )
					{
                        echo  $pdd ;
                        echo "don't forgot ur password next time!";

						//$_SESSION['user_id'] = $user_data['user_id'];
						//header("Location: login.php");
						//die;
					}
					

				}
			}
			else
						{
							echo "wrong inputs try again";
				}
			
		}else
		{
			echo "wrong inputs try again";
			//header("Location: forgotpass.php");
		}
	}


	

?>




<!DOCTYPE html>
<html lang="en">
<head>
    <title>
        Eyita - Forgot Password 
    </title>
    <meta charset="UTF-8">
    <meta name="description" content="Eyita Movies site forgot password">
    <meta name="keywords" content="Eyita movies site habesha forgot password">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
 
</head>


<body>

    <div class="main">  <!--the whoole body -->  
        <input type="checkbox" id="chk" aria-hidden="true"> <!--the checker place for login -->
        <div class="close">
            <div class="bar1"></div>
            <div class="bar2"></div>
        </div>
         <div class="forgot"> <!--the signup layout -->
          <form method = "post">
		    <label for="chk" aria-hidden="true">Forget Password</label>
            <input id ="text" type="text" name="user_name" placeholder="user_name" required="">
            <input id="text" type="text" name="fp" placeholder="Your favorite pet " required ="" >
			  		<input id="text" type="text" name="fc" placeholder="Your favorite club" required ="" >
              		<input id="text" type="text" name="bd" placeholder="Your birthdate date" required ="">
            
            <button type = "submit" value="Signup">Submit</button><br><br>
            <a href ="login.php">want to login</a>
               </form>
        </div>

    </div>


</body>
</html>
