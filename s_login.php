<?php
session_start();
error_reporting(0);
include("connection.php");
if(isset($_SESSION['s_name_of_user']))
{
	header("location:s_profile.php");
}
if(isset($_SESSION['f_name_of_user']))
{
	header("location:f_profile.php");
}
?>

<!DOCTYPE html>
<html>
<head>
	<title>Student Login Page</title>
	<style type="text/css">
		input[type="text"]::placeholder	
		{
			text-align: center;
		}
		input[type="password"]::placeholder
		{
			text-align: center;
		}
		body 
		{
			background: url(library_pic.jpg) no-repeat center center fixed;
			-webkit-background-size: cover;
			-moz-background-size: cover;
			-o-background-size: cover;
			background-size: cover;
		}
		.box1
		{
			position: absolute;
			left: 450px;
			text-align: center;
			width: 400px;
			padding: 20px;
			background-color:  #DAF7A6 ;
			border-radius: 25px;
			height: 255px;
			opacity: 0.9;
		}
		.box2
		{
			position: absolute;
			left: 450px;
			text-align: center;
			width: 400px;
			padding: 20px;
			background-color:  #DAF7A6 ;
			border-radius: 25px;
			height: 325px;
			opacity: 0.9;
			margin-top: 300px;
		}
		a 
		{
			background-color: DodgerBlue;
			color: white;
			padding: 1em 1.5em;
			text-decoration: none;
			text-transform: uppercase;
		}
		.button 
		{
		 	background-color: #4CAF50; /* Green */
			border: none;
			color: white;
			padding: 15px 32px;
			text-align: center;
			text-decoration: none;
			display: inline-block;
			font-size: 16px;
		}
	</style>
</head>
<body>
	<div class="box1">
	<a href="index.php">Home</a>
	<h1>Student Login : </h1>
	<form action="" method="POST">
		Username : <input type="text" name="s_username" placeholder="Username" id="s_username" required><br/><br/>
		Password : <input type="password" name="s_password" placeholder="Password" id="s_password" required><br/><br/>
		<input type="checkbox" name="check1" id="check1" onclick="showpword1()"> Show Password<br/><br/>
		<input class="button" type="submit" name="s_submit" value="Login">
	</form>
	</div>
		<?php

			if(isset($_POST['s_submit']))
			{
				$s_uname = $_POST['s_username'];
				$s_pword = $_POST['s_password'];

				$sql = "select * from login where username='".$s_uname."' and password='".$s_pword."' and type='s';";

				$result = $con->query($sql);

				if($result->num_rows == 1)
				{
					$row = $result->fetch_assoc();
					$_SESSION['s_name_of_user'] = $s_uname;
					$_SESSION['s_password_of_user'] = $s_pword;
					$_SESSION['s_rollnumber_of_user'] = $row['lid'];
					header("location:s_profile.php");
				}
				else
				{
					echo "Login Failed";
				}
			}

		?>
	<div class="box2">
	<h1>Sign Up : </h1>
	<form action="" method="post">
		Username : <input type="text" name="signup_username" id="signup_username" placeholder="Username" required><br/><br/>
		Password : <input type="password" name="signup_password" id="signup_password" placeholder="Password" required><br/><br/>
		<input type="checkbox" name="check2" id="check2" onclick="showpword2()"> Show Password<br/>
		<h4>Select which branch you belong to : </h4>
		<select name="s_branch">
			<option value="CSE">CSE</option>
			<option value="ECE">ECE</option>
			<option value="EEE">EEE</option>
			<option value="MECH">MECH</option>
		</select><br/><br/>
		<input class="button" type="submit" name="signup_submit" value="Sign Up">
	</form>
	</div>

		<?php

			if(isset($_POST['signup_submit']))
			{
				$signup_uname = $_POST['signup_username'];
				$signup_pword = $_POST['signup_password'];

				$branch = $_POST['s_branch'];

				$sql = "insert into login(username,password,type,branch) values('".$signup_uname."','".$signup_pword."','s','".$branch."');";

				$result = $con->query($sql);

				if($result === true)
				{
					echo "Account Created Successfully";
				}
				else
				{
					echo "Sign Up Failed";
				}
			}

		?>

	<script type="text/javascript">
		function showpword1()
		{
			var x = document.getElementById('s_password');
			if(x.type == "password")
			{
				x.type = "text";
			}
			else
			{
				x.type = "password";
			}
		}
		function showpword2()
		{
			var x = document.getElementById('signup_password');
			if(x.type == "password")
			{
				x.type = "text";
			}
			else
			{
				x.type = "password";
			}
		}
	</script>
</body>
</html>
