<?php
	session_start();
	error_reporting(0);

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
	<title>Library Management System</title>
	<style>
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
			text-align: center;
			width: 400px;
			padding: 10px;
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
	</style>
</head>
<body>
	<div class="box">
	<h1 style="color: #FFC300;"><center>Library Management System</center></h1>
	<h3><center>Who are you?</center></h3>
	<center><a href="f_login.php">Manager</a>
	<a href="s_login.php">Student</a></center>
	</div>
</body>
</html>