<?php
	session_start();
	error_reporting(0);
	
	if(isset($_SESSION['f_name_of_user']))
	{
		echo "<center><b style='font-size:30px;background-color:  #DAF7A6;border-radius: 25px;padding: 20px;opacity: 0.9;'>Welcome, ".$_SESSION['f_name_of_user']."</b></center><br><br>";
	}
	else
	{
		header("location:f_login.php");
	}
?>

<!DOCTYPE html>
<html>
<head>
	<title>Faculty Profile Page</title>
	<style type="text/css">
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
			padding: 20px;
			background-color:  #DAF7A6 ;
			border-radius: 25px;
			height: 255px;
			opacity: 0.9;
		}
		a 
		{
			background-color: red;
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
	<form action="f_studentdetails.php" method="post">
		<input class="button" type="submit" name="show_student_details" value="show student details">
	</form>
	<form action="f_listofbooks.php" method="post">
		<input class="button" type="submit" name="show_list_of_books" value="show list of books">
	</form>
	<form action="f_addnewbook.php" method="post">
		<input class="button" type="submit" name="add_new_book_to_the_library" value="add new book to the library">
	</form><br/>
	<a href="f_logout.php">Logout</a>
	</div>
</body>
</html>