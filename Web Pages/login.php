<?php 

session_start();

	include("connection.php");
	include("functions.php");


	if($_SERVER['REQUEST_METHOD'] == "POST")
	{
		//something was posted
		$user_name = $_POST['user_name'];
		$password = $_POST['password'];

		if(!empty($user_name) && !empty($password) && !is_numeric($user_name))
		{

			//read from database
			$query = "select * from userss where user_name = '$user_name' limit 1";
			$result = mysqli_query($con, $query);

			if($result)
			{
				if($result && mysqli_num_rows($result) > 0)
				{

					$user_data = mysqli_fetch_assoc($result);
					
					if($user_data['password'] === $password)
					{

						
						$_SESSION['user_id'] = $user_data['user_id'];
						header("Location: http://localhost/Eyita-main/index.html");
						die;
					}
				}
			}
			
			echo "wrong username or password!";
		}else
		{
			echo "wrong username or password!";
		}
	}


	

?>











<!DOCTYPE html>
<html lang="en" >
<head>
  <meta charset="UTF-8">
  <title>Login</title>
  <link rel="stylesheet" href="/CSS/login.css">

</head>
<body>
<!-- partial:index.partial.html -->
<!DOCTYPE html>
<html>
<head>
	<meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Login</title>
    <link rel="stylesheet" href="../CSS/login.css">
    <link rel="stylesheet" href="../CSS/main.css">

</head>
<body class="body-paral">

	        <!-- -------------------------------Header Begins-------------------------------------->
			<header>
				<nav class="nav">
					<a href="Home Page.html" class="header-logo"><img src="../Resources/Images/Logos/Eyita_logo_only.png" alt="Logo"></a>
					<ul class="nav-list">
						
						<li class="nav-link"><a href="../index.html">Home</a></li>
						<li class="nav-link"><a href="MovieList.html">Movies</a></li>
						<li class="nav-link"><a href="Watchlist.html">Watchlist</a></li>
						<li class="nav-link"><a href="Contact Page.html">Contact Us</a></li>
						<li class="nav-link"><a href="Login Page.html">Log In </a></li>
						
					</ul>
		
					<span id="toggle"><img src="../Resources/Images/icons/toggle.png"></span>
				</nav>
			</header>
			<!---------------------------------Header Ends--------------------------------------- -->

	<div class="main">  <!--the whole body --> 	
		<input type="checkbox" id="chk" aria-hidden="true"> <!--the checker place for login -->

		<div class="login">  <!--the layout of the login part -->
			<form method="POST" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" name = "registered" >
				<label for="chk" aria-hidden="true">Login</label>
			<input id="text" type="text" name="user_name" placeholder="User name" required="">
			<input id="text" type="password" name="password" placeholder="Password" required="">
			
			
			<button type = "submit" value="Login">Login</button>                                        
			</form>
				<a href="forgotpass.php">forgot password?</a>

			  <!--forgot password link in the login layout --></input>
		</div>

			<div class="signup"> <!--the signup layout -->
				<form method = "POST" action = "signup.php" name="registeration" >
					<label for="chk" aria-hidden="true">Sign up</label>
					<input id="text" type="text" name="us" placeholder="User name" required="">
					<input type="email" name="email" placeholder="Email" required="" id="email"> 
					<input id="text" type="password" name="pswd" placeholder="Password" required="" >
					<input id="text" type="password" name="cpswd" placeholder="Confirm Password" required="" >
					<input id="text" type="text" name="fp" placeholder="Your favorite pet (optional)" >
			  		<input id="text" type="text" name="fc" placeholder="Your favorite club (optional)" >
              		<input id="text" type="text" name="bd" placeholder="Your birthdate (optional)" >
					<button type = "submit" value="Signup">Sign up</button>

					

				</form>
                  
			</div>

			
	</div>

</body>
</html>
<!-- partial -->
<!--Script-->

<!--Script-->
</body>
</html>
