<?php
	session_cache_limiter('private_no_expire');
	session_start();
	error_reporting(0);
	include("connection.php");
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
	<title>Student Details</title>
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
	<form action="" method="post">
		Enter the Name of Book : <input type="text" name="book_name" required><br/><br/>
		Number of Copies : 
		<input type="text" name="copies" required><br/><br/>
		<input class='button' type="submit" name="add_book_to_library" value="Add Book to Library">
	</form><br/>	
	<a href="f_logout.php">Logout</a>
	</div>
</body>
</html>

<?php
	if(isset($_POST['add_book_to_library']))
	{
		$book_name =  $_POST['book_name'];
		$number_of_copies = (int)$_POST['copies'];
		if($number_of_copies < 1)
		{
			echo "Invalid Number of copies.";

		}
		else
		{
			$sql1 = "insert into books(book_name,number_of_copies) values('".$book_name."','".$number_of_copies."');";
			
			$result1 = $con->query($sql1);

			$sql2 = "UPDATE books SET lid = '-1' WHERE book_name = '".$book_name."' and number_of_copies = '".$number_of_copies."';";

			$result2 = $con->query($sql2);

			echo "<br/><br/>The book added to library successfully.<br/>";
		}
	}
?>