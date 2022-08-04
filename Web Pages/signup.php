<?php 
session_start();

	include("connection.php");
	include("functions.php");


	if($_SERVER['REQUEST_METHOD'] == "POST")
	{
/*


		$nameErr = $emailErr = $passworderr =$cpasserr="";
		$user_name = $password =$email = $fp = $fc = $bd = $confirm_password="";


 		 if (empty($_POST["us"])) {  
         $nameErr = "Name is required";  
    } else {  
        $user_name = input_data($_POST["us"]);  
            // check if name only contains letters and whitespace  
            if (!preg_match("/^[a-zA-Z ]*$/",$user_name)) {  
                $nameErr = "Only alphabets and white space are allowed";  
            }  
    }  
      
    //Email Validation   
    if (empty($_POST["email"])) {  
            $emailErr = "Email is required";  
    } else {  
            $email = input_data($_POST["email"]);  
            // check that the e-mail address is well-formed  
            if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {  
                $emailErr = "Invalid email format";  
            }  
     }  


     	if (empty($_POST["pswd"])) {  
            $$passworderr = "Passowrd is required";  
    } else {  
            $password = input_data($_POST["pswd"]);  
            
     }  
     	if (empty($_POST["cpswd"])) {  
            $cpasserr = "Passowrd is required";  
    } else {  

            $confirm_password = input_data($_POST["cpswd"]);
            if($_POST['pswd'] !== $_POST['cpass'])
            	$cpasserr = "doesn't match";
            
     } 
*/



		//something was posted
		$user_name = input_data($_POST['us']);
		$password = input_data($_POST['pswd']);
		$email = input_data($_POST['email']);
		$fp = input_data( $_POST['fp']);
		$fc = input_data($_POST['fc']);
		$bd = input_data($_POST['bd']);
		$confirm_password =input_data($_POST['cpswd']);
		if(!empty($user_name) && !empty($password) && !is_numeric($user_name) && preg_match("/^[a-zA-Z ]*$/",$user_name) && !empty($email) && !empty($confirm_password) && filter_var($email, FILTER_VALIDATE_EMAIL) && $password === $confirm_password )
		{

			//save to database
			$user_id = random_num(20);
			$query = "insert into userss (user_id,user_name,password,confirm_password,email,favorite_pet,favorite_club,date_of_birth) values ('$user_id','$user_name','$password','$confirm_password','$email','$fp','$fc','$bd')";

			mysqli_query($con, $query);

			header("Location: login.php");
			die;
		}else
		{
			echo "Please enter some valid information!";
		}
	}


	function input_data($data) {  
  $data = trim($data);  
  $data = stripslashes($data);  
  $data = htmlspecialchars($data);  
  return $data;  
} 
?>


