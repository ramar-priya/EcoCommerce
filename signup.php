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

			//save to database
			$user_id = random_num(20);
			$query = "insert into user (user_id,user_name,password) values ('$user_id','$user_name','$password')";

			mysqli_query($con, $query);

			header("Location: login.php");
			die;
		}else
		{
			echo "Please enter some valid information!";
		}
	}
?>


<!DOCTYPE html>
<html>
<head>
	<title>Singup</title>
	<link rel="stylesheet" href="style6.css" />
	<link rel="stylesheet" href="https://unicons.iconscout.com/release/v4.0.0/css/line.css" />
</head>
<body>	
<header class="header">
      <nav class="nav">
        <button class="button"  id="form-open">Signup</button>
      </nav>
    </header>
	<section class="home">
      <div class="form_container">
        <i class="uil uil-times form_close"></i>
        <!-- Login From -->
        <div class="form login_form">
		<form method="post">
		<h2>Signup</h2>
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

            Already have an account?<a href="login.php">login</a>
        </form>
      </div>
    </section>
	<script src="test1.js"></script>
</body>
</html>