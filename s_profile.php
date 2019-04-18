<?php
	session_start();
	error_reporting(0);
	include("connection.php");
	if(isset($_SESSION['s_name_of_user']))
	{
		echo "<center><b style='font-size:30px;background-color:  #DAF7A6;border-radius: 25px;padding: 20px;opacity: 0.9;'>Welcome, ".$_SESSION['s_name_of_user']."</b></center><br><br>";
	}
	else
	{
		header("location:s_login.php");
	}
?>
<!DOCTYPE html>
<html>
<head>
	<title>Student Profile Page</title>
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
			text-align: center;
			width: 100%;
			padding: 25px;
			background-color:  #DAF7A6;
			border-radius: 25px;
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
	<form action="s_borrowed_books.php" method="post">
		<input class='button' type="submit" name="list_of_books_borrowed" value="List of Books Borrowed"><br><br>
	</form>
	<form action="s_borrow_a_book.php" method="post">
		<input class='button' type="submit" name="list_of_books_in_library_to_borrow" value="List of Books in Library to Borrow"><br><br>
	</form>
	<a href="s_logout.php">Logout</a>
	</div>
</body>
</html>