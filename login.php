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
			$query = "select * from user where user_name = '$user_name' limit 1";
			$result = mysqli_query($con, $query);

			if($result)
			{
				if($result && mysqli_num_rows($result) > 0)
				{

					$user_data = mysqli_fetch_assoc($result);
					
					if($user_data['password'] === $password)
					{

						$_SESSION['user_id'] = $user_data['user_id'];
						header("Location: homepage.html");
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
<html>
<head>
	<title>Login</title>
	<link rel="stylesheet" href="style6.css" />
	<link rel="stylesheet" href="https://unicons.iconscout.com/release/v4.0.0/css/line.css" />
</head>
<body>	
<header class="header">
      <nav class="nav">
        <button class="button"  id="form-open">Login</button>
      </nav>
    </header>
	<section class="home">
      <div class="form_container">
        <i class="uil uil-times form_close"></i>
        <!-- Login From -->
        <div class="form login_form">
		<form method="post">
		<h2>Login</h2>
		<div class="input_box">
              <i class="uil uil-user"></i>
              <input  id="text" type="text" name="user_name" placeholder="Enter your Username" required />
              
            </div>
			<div class="input_box">
              <input id="text" type="password" name="password" placeholder="Enter your password" required />
              <i class="uil uil-lock password"></i>
              <i class="uil uil-eye-slash pw_hide"></i>
            </div>
			<input id="button1" type="submit" value="Login" class="button1">

            <div>Don't have an account? </div><a href="signup.php" id="signup">Signup</a>
        </form>
      </div>
    </section>
	<script src="test1.js"></script>
</body>
</html>