<?php
session_start();
error_reporting(0);
include("connection.php");
if(isset($_SESSION['f_name_of_user']))
{
	header("location:f_profile.php");
}
if(isset($_SESSION['s_name_of_user']))
{
	header("location:s_profile.php");
}
?>

<!DOCTYPE html>
<html>
<head>
	<title>Manager Login Page</title>
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
		.box
		{
			position: absolute;
			left: 450px;
			width: 400px;
			padding: 60px;
			background-color:  #DAF7A6 ;
			border-radius: 25px;
			height: 225px;
			opacity: 0.9;
			margin-top: 200px;
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
	<div class="box">
	<center>
	<a href="index.php">Home</a>
	<h1>Manager Login : </h1>
	<form action="" method="POST">
		Username : <input type="text" name="f_username" placeholder="Username" id="f_username"><br/><br/>
		Password : <input type="password" name="f_password" placeholder="Password" id="f_password"><br/><br/>
		<input type="checkbox" name="check3" id="check3" onclick="showpword3()"> Show Password<br/><br/>		
		<input class = "button" type="submit" name="f_submit" value="Login">
		</center>
	</form>
	</div>
	<script type="text/javascript">
		function showpword3()
		{
			var x = document.getElementById('f_password');
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

<?php

if(isset($_POST['f_submit']))
{
	$f_uname = $_POST['f_username'];
	$f_pword = $_POST['f_password'];
	 
	$sql = "select * from login where username='".$f_uname."' and password='".$f_pword."' and type='m' and branch='manager'";

	$result = $con->query($sql);

	if($result->num_rows == 1)
	{
		$row = $result->fetch_assoc();
		$_SESSION['f_name_of_user'] = $f_uname;
		$_SESSION['f_password_of_user'] = $f_pword;
		$_SESSION['f_sr_of_user'] = $row['sr'];
		header("location:f_profile.php");
	}
	else
	{
		echo "Login Failed";
	}
}

?>